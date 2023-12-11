<?php

use Illuminate\Support\Facades\Route;

// Auth Prefix Group
Route::prefix('auth')->group(function () {
    // Login
    require('login.php');
    // Register
    require('register.php');
    // Forgot password
    require('forgot.php');
});
