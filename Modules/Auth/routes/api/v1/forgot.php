<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\app\Http\Controllers\Api\V1\ResetPasswordController;

Route::group(['prefix' => 'forgot/password'] , function(){
    // Forgot Password with email
    Route::group(['prefix' => 'email'] , function(){
        Route::post('', [ResetPasswordController::class, 'forgotWithEmail']);
        Route::post('verify', [ResetPasswordController::class, 'forgotVerifyWithEmail']);
        Route::post('reset', [ResetPasswordController::class, 'resetWithEmail']);
    });

    // Forgot Password with phone
    /*
    Route::post('/password/phone/forgot', [ResetPasswordController::class, 'forgotWithPhone']);
    Route::post('/password/phone/forgot/verify', [ResetPasswordController::class, 'forgotVerifyWithPhone']);
    Route::post('/password/phone/reset', [ResetPasswordController::class, 'resetWithPhone']);
    */
});
