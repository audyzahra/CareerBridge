<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;


// ==========================================
// HALAMAN UTAMA CAREERBRIDGE
// ==========================================

Route::get('/', function () {

    if (Auth::check()) {
        return match (Auth::user()->role) {
            'super_admin' => redirect()->route('super-admin.dashboard'),
            'organizer' => redirect()->route('organizer.dashboard'),
            'student' => view('public.home'),
            default => abort(403, 'Role pengguna tidak dikenali.'),
        };
    }

    return view('public.home');

})->name('home');


// ==========================================
// HALAMAN PUBLIK
// ==========================================

Route::get('/opportunities', function () {
    return 'Halaman Jelajahi Peluang';
})->name('opportunities.index');

Route::view('/about', 'public.about.index')
    ->name('about');


// ==========================================
// LOGIN
// ==========================================

Route::get('/login', [LoginController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.store');


// ==========================================
// REGISTER
// ==========================================

Route::get('/register', [RegisterController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.store');


// ==========================================
// LOGOUT
// ==========================================

Route::post('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ==========================================
// SUPER ADMIN
// ==========================================

Route::prefix('super-admin')
    ->name('super-admin.')
    ->middleware(['auth', 'role:super_admin'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('super-admin.dashboard');
        })->name('dashboard');

        Route::get('/users', fn () => 'Halaman Kelola Pengguna')
            ->name('users.index');

        Route::get('/organizers', fn () => 'Halaman Kelola Organizer')
            ->name('organizers.index');

        Route::get('/opportunities', fn () => 'Halaman Kelola Peluang')
            ->name('opportunities.index');

        Route::get('/settings', fn () => 'Halaman Pengaturan')
            ->name('settings');
    });


// ==========================================
// ORGANIZER
// ==========================================

Route::prefix('organizer')
    ->name('organizer.')
    ->middleware(['auth', 'role:organizer'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('organizer.dashboard');
        })->name('dashboard');

        Route::get('/opportunities', fn () => 'Halaman Lomba Saya')
            ->name('opportunities.index');

        Route::get('/profile', fn () => 'Halaman Profil Organizer')
            ->name('profile');
    });


// ==========================================
// STUDENT
// Tidak menggunakan dashboard
// Menggunakan tampilan website publik
// ==========================================

Route::prefix('student')
    ->name('student.')
    ->middleware(['auth', 'role:student'])
    ->group(function () {

        // Beranda Student
        Route::view('/home', 'student.home')
            ->name('home');

        // Jelajahi Peluang
        Route::get('/opportunities', function () {
            return view('student.opportunities.index', [
                'opportunities' => collect(),
            ]);
        })->name('opportunities');

        // Peluang Tersimpan
        Route::get('/saved', function () {
            return 'Halaman Peluang Tersimpan';
        })->name('saved');

        // Pendaftaran Saya
        Route::get('/applications', function () {
            return 'Halaman Pendaftaran Saya';
        })->name('applications');

        // Notifikasi
        Route::get('/notifications', function () {
            return 'Halaman Notifikasi';
        })->name('notifications');

        // Profil Saya
        Route::view('/profile', 'student.profile.index')
            ->name('profile');

    });
