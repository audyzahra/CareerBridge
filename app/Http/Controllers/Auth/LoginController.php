<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Memproses login pengguna.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required', 'string'],
            ],
            [
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'password.required' => 'Password wajib diisi.',
            ]
        );

        if (! Auth::attempt($credentials)) {
            return back()
                ->withErrors([
                    'email' => 'Email atau password yang kamu masukkan salah.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        // Redirect berdasarkan role pengguna.
        $redirectRoute = match (Auth::user()->role) {
            'super_admin' => 'super-admin.dashboard',
            'organizer' => 'organizer.dashboard',
            'student' => 'home',
            default => null,
        };

        // Menolak akun dengan role yang tidak dikenali.
        if (! $redirectRoute) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Role akun tidak dikenali. Silakan hubungi administrator.',
                ]);
        }

        return redirect()->route($redirectRoute);
    }
}
