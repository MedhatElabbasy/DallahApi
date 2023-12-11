<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\app\Http\Controllers\Api\V1\LoginController;

// Login with email
Route::post('/login/email', [LoginController::class, 'loginWithEmail']);

// Login with phone
Route::post('/login/phone', [LoginController::class, 'loginWithPhone']);

/*
    Login with Id Card
    Login with job number
*/
Route::post('/login/number', [LoginController::class, 'LoginWithNumber']);
