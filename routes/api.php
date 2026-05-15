<?php

use App\Http\Controllers\cms\EnquiryController;
use App\Http\Controllers\cms\PaymentController;
use Illuminate\Support\Facades\Route;


Route::prefix('api')->middleware(['api'])->group(function () {
    Route::post('/payment/create-order',        [PaymentController::class, 'createOrder']);
    Route::post('/payment/razorpay-success',    [PaymentController::class, 'razorpaySuccess']);
    // Route::post('/payment/stripe-success',      [PaymentController::class, 'stripeSuccess']);
});

Route::post('/store-enquiry', [EnquiryController::class, 'store']);
