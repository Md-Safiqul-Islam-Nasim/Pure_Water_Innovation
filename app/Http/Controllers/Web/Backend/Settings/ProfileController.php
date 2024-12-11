<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use Exception;
use App\Models\User;
use App\Helpers\Helpers;
use Illuminate\View\View;
use App\Models\UserDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display the profile settings page.
     *
     * @return View
     */
    public function showProfile()
    {

        // $userDetails = UserDetail::where('user_id', Auth::id())->first();, ['userDetails' => $userDetails]
        return view('backend.layouts.settings.profile-settings');
    }
    

    /**
     * Update the user's profile information.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'nullable|max:100|min:2',
            'email' => 'nullable|email|unique:users,email,' . auth()->user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $user        = Users::find(auth()->user()->id);
            $user->name  = $request->name;
            $user->email = $request->email;

            $user->save();
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (Exception) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the user's password.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password'     => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $user = Auth::user();
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect()->back()->with('success', 'Password updated successfully');
            } else {
                return redirect()->back()->with('error', 'Current password is incorrect');
            }
        } catch (Exception) {
            return redirect()->back()->with('t-error', 'Something went wrong');
        }
    }

    /**
     * Update the user's profile picture.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function UpdateProfilePicture(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
        ]);
        try {
            $user = Auth::user();

            if ($request->hasFile('photo')) {
                // Delete the old image if it exists
                if ($user->photo) {
                    Helpers::deleteMedia($user->photo);
                }

                // Upload the new image
                $avatarPath = Helpers::uploadMedia($request->file('photo'), 'user/', Str::random(10));
                $user->photo = $avatarPath;
                $user->save();  // Save the updated user record

                return response()->json([
                    'success' => true,
                    'image_url' => asset($avatarPath), // Assuming the uploaded path is correct
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No image uploaded',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while uploading the profile picture.',
            ]);
        }
    }
}
