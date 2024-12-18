<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RoleSelectionController extends Controller
{
    /**
     * Show role selection page
     */
    public function showRoleSelection()
    {
        $user = Auth::user();

        // If the user already has a role, redirect to their dashboard
        if ($user->role) {
            return $this->redirectBasedOnRole($user);
        }
        // If no role, show role selection page
        return view('auth.select-role');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        return redirect()->route('user-dashboard');
    }

    /**
     * Save the role selected by the user
     */
    public function setRole(Request $request)
    {
        $request->validate([
            'role' => 'required|in:admin,user', // Validate that role is either 'admin' or 'user'
        ]);

        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        // Redirect based on the role
        return $this->redirectBasedOnRole($user);
    }

    /**
     * Redirect user based on their role
     */
    protected function redirectBasedOnRole($user)
    {
        if ($user->role === 'admin') {
            return redirect('/dashboard');
        } elseif ($user->role === 'user') {
            return redirect('/user-dashboard');
        }
    }
}
