<?php

use Illuminate\Support\Facades\Route;

// Auth Prefix Group
Route::prefix('blog')->group(function () {
    // Blog
    require('blog.php');
});
