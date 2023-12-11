<?php
use Modules\Blog\app\Http\Controllers\Api\V1\BlogController;

Route::get('/', [BlogController::class, 'index']);
Route::get('/{id}', [BlogController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/', [BlogController::class, 'store']);
    Route::put('/{id}', [BlogController::class, 'update']);
    Route::delete('/{id}', [BlogController::class, 'destroy']);
});
