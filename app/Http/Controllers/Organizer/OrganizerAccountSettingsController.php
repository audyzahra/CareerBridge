<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class OrganizerAccountSettingsController extends Controller
{
    /**
     * Display account settings.
     */
    public function index()
    {
        $user = Auth::user();

        return view('organizer.settings.index', compact('user'));
    }

    /**
     * Update account information.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return redirect()
            ->route('organizer.settings')
            ->with('profile_success', 'Account information has been updated successfully.');
    }

    /**
     * Update account password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
        ]);

        $user = Auth::user();

        $user->update([
            'password' => $validated['password'],
        ]);

        return redirect()
            ->route('organizer.settings')
            ->with('password_success', 'Your password has been changed successfully.');
    }
}
