<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/categories', [categoriesController::class, 'index']);
   
    Route::get('/categories/create', [categoriesController::class, 'create']);
    Route::post('/categories', [categoriesController::class, 'store'])->name("admin.categories");
   
    Route::get('/categories/{id}/edit', [categoriesController::class, 'edit']);
    Route::put('/categories/{id}', [categoriesController::class, 'update']);

    Route::get('/categories/{id}/show', [categoriesController::class, 'show']);

    Route::delete('/categories/{id}', [categoriesController::class, 'destroy']);


    
    Route::resource('products', productController::class);


});

Route::get('/shop', [HomeController::class, 'shop']);
