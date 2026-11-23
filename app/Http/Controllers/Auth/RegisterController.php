<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman register.
     */
    public function showRegister(): View
    {
        return view('auth.register');
    }

    /**
     * Memproses pendaftaran pengguna.
     */
    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'role' => ['required', Rule::in(['student', 'organizer'])],
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                    'regex:/[a-zA-Z]/',
                    'regex:/[0-9]/',
                ],
            ],
            [
                'name.required' => 'Nama lengkap wajib diisi.',
                'name.max' => 'Nama lengkap maksimal 255 karakter.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'role.required' => 'Silakan pilih jenis akun.',
                'role.in' => 'Jenis akun yang dipilih tidak valid.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'password.regex' => 'Password harus mengandung huruf dan angka.',
            ]
        );

        // Membuat akun baru.
        // Password di-hash otomatis melalui cast pada model User.
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'password' => $validated['password'],
        ]);

        // Login otomatis setelah registrasi.
        Auth::login($user);

        $request->session()->regenerate();

        // Redirect berdasarkan role.
        $redirectRoute = match ($user->role) {
            'student' => 'home',
            'organizer' => 'organizer.dashboard',
        };

        return redirect()
            ->route($redirectRoute)
            ->with('success', 'Pendaftaran berhasil! Selamat datang di CareerBridge.');
    }
}
