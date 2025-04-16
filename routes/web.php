<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

// register & login
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

// Email verification routes
Route::get('email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

// Route to handle email verification with user ID and hash
Route::get('email/verify/{id}/{hash}', function ($id, $hash) {
    $user = \App\Models\User::findOrFail($id);
    // Check if the hash matches the email's hashed version
    if (hash_equals($hash, sha1($user->email))) {
        $user->markEmailAsVerified();
    }
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Home route that requires email verification
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);
// Forget Password
Route::get('/forgot-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('rest-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('rest-password', [AuthController::class, 'rest'])->name('password.update');
// dashboard
// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('role:admin,seller');

Route::middleware(['role:admin,seller'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/users', [UserManagementController::class, 'index']);
    Route::get('/dashboard/users/{id}/edit', [UserManagementController::class, 'editUser'])->name('users.edit');
    Route::patch('/dashboard/users/{id}', [UserManagementController::class, 'updateUser'])->name('users.update');
    Route::delete('/dashboard/users/{id}', [UserManagementController::class, 'deleteUser'])->name('users.destroy');
});
// logout
Route::post('/logout',function(){
    Auth::logout();
    return redirect('/');
})->name('logout');