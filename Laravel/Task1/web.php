<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/admin', [AdminController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/category', [AdminController::class, 'category']);
});
