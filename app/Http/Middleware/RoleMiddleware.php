<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Memeriksa hak akses pengguna berdasarkan role.
     */
    public function handle(
        Request $request,
        Closure $next,
        string ...$roles
    ): Response {

        // Pastikan pengguna sudah login.
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        // Periksa role pengguna.
        if (! in_array($user->role, $roles, true)) {
            abort(403, 'Kamu tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
