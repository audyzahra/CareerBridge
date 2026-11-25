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

use App\Http\Controllers\Organizer\OrganizerProfileController;
use App\Http\Controllers\Organizer\OrganizerAccountSettingsController;


// ==========================================
// HALAMAN UTAMA CAREERBRIDGE
// ==========================================

Route::get('/', function () {

    if (Auth::check()) {
        return match (Auth::user()->role) {
            'super_admin' => redirect()->route('super-admin.dashboard'),
            'organizer' => redirect()->route('organizer.dashboard'),
            'student' => redirect()->route('student.home'),
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

        // ======================================
        // DASHBOARD
        // ======================================

        Route::get('/dashboard', function () {
            return view('organizer.dashboard');
        })->name('dashboard');


        // ======================================
        // MY OPPORTUNITIES
        // Managed by another team
        // ======================================

        Route::get('/opportunities', function () {
            return view('organizer.opportunities.index');
        })->name('opportunities.index');

        Route::get('/opportunities/create', function () {
            return view('organizer.opportunities.create');
        })->name('opportunities.create');

        Route::get('/opportunities/{opportunity}/edit', function ($opportunity) {
            return view('organizer.opportunities.edit');
        })->name('opportunities.edit');


        // ======================================
        // APPLICANT MANAGEMENT
        // ======================================

        Route::get('/applicants', function () {
            return response(
                'Applicant Management is currently under development.',
                501
            );
        })->name('applicants.index');


        // ======================================
        // NOTIFICATIONS
        // ======================================

        Route::get('/notifications', function () {
            return response(
                'Notifications are currently under development.',
                501
            );
        })->name('notifications.index');


        // ======================================
        // ORGANIZER PROFILE
        // ======================================

        Route::get('/profile', [
            OrganizerProfileController::class,
            'index'
        ])->name('profile');

        Route::get('/profile/edit', [
            OrganizerProfileController::class,
            'edit'
        ])->name('profile.edit');

        Route::put('/profile', [
            OrganizerProfileController::class,
            'update'
        ])->name('profile.update');


        // ======================================
        // ACCOUNT SETTINGS
        // ======================================

        Route::get('/settings', [
            OrganizerAccountSettingsController::class,
            'index'
        ])->name('settings');

        Route::put('/settings/profile', [
            OrganizerAccountSettingsController::class,
            'updateProfile'
        ])->name('settings.update-profile');

        Route::put('/settings/password', [
            OrganizerAccountSettingsController::class,
            'updatePassword'
        ])->name('settings.update-password');

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

        // Home Student
        Route::view('/home', 'student.home')
            ->name('home');

        // Explore Opportunities
        Route::get('/opportunities', function () {
            return view('student.opportunities.index', [
                'opportunities' => collect(),
            ]);
        })->name('opportunities');

        // Saved Opportunities
        Route::get('/saved', function () {
            return view('student.saved.index');
        })->name('saved');

        // My Applications
        Route::get('/applications', function () {
            return view('student.applications.index');
        })->name('applications');

        // Notifications
        Route::get('/notifications', function () {
            return view('student.notifications.index');
        })->name('notifications');

        // My Profile
        Route::view('/profile', 'student.profile.index')
            ->name('profile');

    });
