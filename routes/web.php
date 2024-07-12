<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Redirect the root URL to /locations
Route::redirect('/', '/locations')->name('dashboard');

// Public routes (no authentication required)
// These could be other pages or the login/register if not already included in auth.php

// Email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/locations');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Authenticated routes with email verification required
Route::middleware(['auth', 'verified'])->group(function () {
    // Note resource routes
    Route::resource('locations', LocationController::class);

    // Location routes
    Route::get('/locations/districts/{district_id}', [LocationController::class, 'getDistricts']);
    Route::get('/locations/townships/{district_id}', [LocationController::class, 'getTownships']);
    Route::get('/locations/streets/{township_id}', [LocationController::class, 'getStreets']);
});

// Authenticated profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include the auth routes provided by Laravel Breeze or similar package
require __DIR__.'/auth.php';
