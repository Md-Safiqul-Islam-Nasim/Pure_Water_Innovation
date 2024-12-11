<?php


namespace App\Http\Controllers\Web\Frontend\Users;

use App\Models\Users;
use App\Helpers\Helpers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Validator;
use App\Notifications\UserActionNotification;
use App\Models\Notification; // Import your Notification model



class UserProfileController extends Controller
{
    // Display the authenticated user's profile
    public function index()
    {
        $user = auth()->user();

        return view('frontend.layouts.profile.user-profile', compact('user'));
    }

    // Show the edit form for the user
    public function editProfile($id)
    {
        $user = Users::findOrFail($id);
        return view('frontend.layouts.profile.user-profile', compact('user'));
    }

    public function UpdateUserProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'nullable|max:100|min:2',
            'email' => 'nullable|email|unique:users,email,' . auth()->user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $user = auth()->user();
            $oldName = $user->name;
            $oldEmail = $user->email;

            $notificationService = new NotificationService(); // Direct instantiation

            if ($request->has('name')) {
                $user->name = $request->name;
                $user->save();

                if ($user->name != $oldName) {
                    $notificationService->createNotification($user->id, 'Profile Update', "Name updated from {$oldName} to {$request->name}");
                }
            }

            if ($request->has('email')) {
                $user->email = $request->email;
                $user->save();

                // Trigger notification for email change
                if ($user->email != $oldEmail) {
                    $notificationService->createNotification($user->id, 'Profile Update', "Email updated from {$oldEmail} to {$request->email}");
                }
            }
            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function UpdateUserPassword(Request $request, $id)
    {
        $user = Users::findOrFail($id);

        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
        ]);

        try {
            $notificationService = new NotificationService(); // Create NotificationService instance

            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                $uname = $user->name;
                // Log the notification for a successful password change
                $notificationService->createNotification($user->id,'Password Update',"{$uname} changed his Password.");

                return back()->with('success', 'Password updated successfully!');
            } else {
                return back()->with('error', 'Old password is incorrect.');
            }
        } catch (\Exception $e) {
            Log::error('Password update failed.', ['error' => $e->getMessage()]);
            return back()->with('error', 'Something went wrong.');
        }
    }
    public function UpdateUserProfilePicture(Request $request)
    {
        try {
            $request->validate([
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
            ]);

            Log::info('Request validation passed.');

            $user = Auth::user();
            Log::info('User found: ', ['user' => $user]);

            if ($request->hasFile('photo')) {
                Log::info('File detected.');

                $notificationService = new NotificationService(); // Create NotificationService instance

                // Delete the old image
                if ($user->photo) {
                    Helpers::deleteMedia($user->photo);
                    Log::info('Old image deleted.');
                }

                // Upload the new image
                $avatarPath = Helpers::uploadMedia($request->file('photo'), 'user/', Str::random(10));
                $user->photo = $avatarPath;

                Log::info('Uploaded path: ', ['path' => $avatarPath]);

                $user->save();
                Log::info('User saved.');
                $uname = $user->name;
                // Log the notification for a successful profile picture update
                $notificationService->createNotification(
                    $user->id,
                    'Profile Picture Update',
                    "$uname changed his Profile picture."
                );

                return response()->json([
                    'success' => true,
                    'image_url' => asset($avatarPath),
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No image uploaded.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error occurred: ', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while uploading the profile picture.',
            ]);
        }
    }
}
