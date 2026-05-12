<?php

use App\Http\Controllers\cms\DashboardController;
use App\Http\Controllers\cms\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('cms')->name('cms.')->middleware(['auth'])->group(function () {
    Route::get('dashboard',         [DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/payment-data',     [DashboardController::class, 'paymentData'])->name('paymentData');

    //Profile and passwords
    Route::get('profile',           [UserController::class,'profile'])->name('profile');
    Route::put('update-profile',    [UserController::class,'updateProfile'])->name('updateProfile');
    Route::get("/change/password",  [UserController::class,'changePassword'])->name("changePassword");
    Route::post("/update/password", [UserController::class,'updatePassword'])->name("updatePassword");
});
