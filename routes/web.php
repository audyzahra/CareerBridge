<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\OrganizerController;
use App\Http\Controllers\SuperAdmin\OpportunityController;


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
    return view('public.opportunities.index', [
        'opportunities' => collect(),
    ]);
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

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // User Management
        Route::resource('users', UserController::class)
            ->except(['show']);

        // Organizer Management
        Route::resource('organizers', OrganizerController::class)
            ->only(['index', 'show']);

        Route::patch('/organizers/{organizer}/verification', [
            OrganizerController::class,
            'updateVerification'
        ])->name('organizers.update-verification');

        // Opportunity Management
        Route::resource('opportunities', OpportunityController::class)
            ->only(['index', 'show']);

        Route::patch('/opportunities/{opportunity}/publication-status', [
            OpportunityController::class,
            'updatePublicationStatus'
        ])->name('opportunities.update-publication-status');

        Route::patch('/opportunities/{opportunity}/verification-status', [
            OpportunityController::class,
            'updateVerificationStatus'
        ])->name('opportunities.update-verification-status');

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

        Route::get('/opportunities', function () {
            return view('organizer.opportunities.index');
        })->name('opportunities.index');

        // Create Opportunity
        Route::get('/opportunities/create', function () {
            return view('organizer.opportunities.create');
        })->name('opportunities.create');

        // Edit Opportunity
        Route::get('/opportunities/{opportunity}/edit', function () {
            return view('organizer.opportunities.edit');
        })->name('opportunities.edit');

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
