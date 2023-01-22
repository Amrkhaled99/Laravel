<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrdersController;




Route::get('/', [HomeController::class,'index']);
Route::get('/add-product', [HomeController::class, 'add_product']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/cart', [OrdersController::class, 'cart'])->name('cart');
Route::get('/productServices', [OrdersController::class, 'productServices']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'can:is_admin'])->prefix('/admin')->group(function () {
    Route::get('', [adminController::class, 'admin']);
    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
});
