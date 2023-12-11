<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\app\Http\Controllers\Api\V1\RegisterController;

// Register with email
Route::post('/register/email', [RegisterController::class, 'registerWithEmail']);

// Register with phone
Route::post('/register/phone', [RegisterController::class, 'registerWithPhone']);
