<?php


namespace App\Http\Controllers\Web\Backend\Users;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
        {
            $users = Users::all(); // Ensure the model is correct and matches your database
            return view('backend.layouts.users.users-list', compact('users'));
        }


    public function create()
    {
        return view('backend.layouts.users.create');
    }

    // public function showDashboard()
    // {
    //     $users = Users::all();
        
    //     // Debugging: dump the products to check if they are being fetched correctly
    //     // dd($products);

    //     return view('backend.layouts.dashboard.dashboard', compact('users'));
    // }


    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // Ensure passwords match
        ]);

        $user = Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Redirect to the users list page with a success message
        return redirect()->route('users-list')->with('success', 'User created successfully!');
    }




    public function edit(Users $user)
    {
        return view('backend.layouts.users.edit', compact('user'));
    }


    public function update(Request $request, Users $user)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update the user's information
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Redirect back with success message
        return redirect()->route('users-list')->with('success', 'User updated successfully');
    }


    public function destroy($id)
{
    $user = Users::findOrFail($id);
    $user->delete();

    return redirect()->route('users-list')->with('success', 'User deleted successfully.');
}

}