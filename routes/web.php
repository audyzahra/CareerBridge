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

use App\Http\Controllers\Organizer\OrganizerOpportunityController;
use App\Http\Controllers\Organizer\OrganizerProfileController;
use App\Http\Controllers\Organizer\OrganizerAccountSettingsController;

use App\Http\Controllers\Public\OpportunityController as PublicOpportunityController;

use App\Http\Controllers\Student\StudentApplicationController;
use App\Http\Controllers\Student\StudentProfileController;



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

// Explore Opportunities
Route::get('/opportunities', [PublicOpportunityController::class, 'index'])
    ->name('opportunities.index');

// Opportunity Details
Route::get('/opportunities/{slug}', [PublicOpportunityController::class, 'show'])
    ->name('opportunities.show');

// About Us
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
        // MY OPPORTUNITIES
        // ======================================

        // Display all opportunities
        Route::get('/opportunities', [
            OrganizerOpportunityController::class,
            'index'
        ])->name('opportunities.index');

        // Show create opportunity form
        Route::get('/opportunities/create', [
            OrganizerOpportunityController::class,
            'create'
        ])->name('opportunities.create');

        // Store new opportunity
        Route::post('/opportunities', [
            OrganizerOpportunityController::class,
            'store'
        ])->name('opportunities.store');

        // Show edit opportunity form
        Route::get('/opportunities/{opportunity}/edit', [
            OrganizerOpportunityController::class,
            'edit'
        ])->name('opportunities.edit');

        // Update existing opportunity
        Route::put('/opportunities/{opportunity}', [
            OrganizerOpportunityController::class,
            'update'
        ])->name('opportunities.update');

        // Delete opportunity
        Route::delete('/opportunities/{opportunity}', [
            OrganizerOpportunityController::class,
            'destroy'
        ])->name('opportunities.destroy');
        
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
            return redirect()->route('opportunities.index');
        })->name('opportunities');

        // Saved Opportunities
        Route::get('/saved', function () {
            return view('student.saved.index');
        })->name('saved');

        // My Applications
        // My Applications
        Route::get('/applications', [
            StudentApplicationController::class,
            'index'
        ])->name('applications');

        Route::get('/applications/{id}', [
            StudentApplicationController::class,
            'show'
        ])->name('applications.show');

        // Notifications
        Route::get('/notifications', function () {
            return view('student.notifications.index');
        })->name('notifications');

        // My Profile
        Route::get('/profile', [
            StudentProfileController::class,
            'index'
        ])->name('profile');

        Route::put('/profile', [
            StudentProfileController::class,
            'update'
        ])->name('profile.update');

        // Application Form
        Route::get('/opportunities/{slug}/apply', [
            StudentApplicationController::class,
            'create'
        ])->name('opportunities.apply.create');

        // Submit Application
        Route::post('/opportunities/{slug}/apply', [
            StudentApplicationController::class,
            'store'
        ])->name('opportunities.apply');
    });
