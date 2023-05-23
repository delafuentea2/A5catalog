<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/cart', [CartController::class,'show'])->name('cart');
    Route::post('/post', [CartController::class,'store'])->name('cart.store');
    Route::post('/pay', [CartController::class,'pay'])->name('pay');
});

Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductController::class, 'show'])->name('productos.show');

Route::get('/productos/nuevo', [ProductController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [ProductController::class, 'store'])->name('productos.store');
Route::post('/productos/update/{id}', [ProductController::class, 'update'])->name('productos.update');
Route::delete('/productos/delete/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');

Route::middleware('superuser')->group(function () {
    Route::get('/productos/nuevo', [ProductController::class, 'create'])->name('productos.create');
    Route::post('/productos/store', [ProductController::class, 'store'])->name('productos.store');
    Route::post('/productos/update/{id}', [ProductController::class, 'update'])->name('productos.update');
    Route::delete('/productos/delete/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');
})->middleware('superuser');

require __DIR__.'/auth.php';

