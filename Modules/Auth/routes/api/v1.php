<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\app\Http\Controllers\Api\V1\LoginController;

// Auth Prefix Group
Route::prefix('auth')->group(function () {
    // Login
    include('login.php');
    // Register
    include('register.php');
    // Forgot password
    include('forgot.php');
});
