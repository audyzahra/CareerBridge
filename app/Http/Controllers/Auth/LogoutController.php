<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Memproses logout pengguna.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        // Menghapus session pengguna.
        $request->session()->invalidate();

        // Membuat token CSRF baru.
        $request->session()->regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Kamu berhasil logout.');
    }
}
