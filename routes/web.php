<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
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

//PRODUCTOS
Route::get('/productos', [ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductController::class, 'show'])->name('productos.show');

Route::get('/productos/nuevo', [ProductController::class, 'create'])->name('productos.create');

Route::post('/productos/store', [ProductController::class, 'store'])->name('productos.store');
Route::post('/productos/update/{id}', [ProductController::class, 'update'])->name('productos.update');
Route::delete('/productos/delete/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');

//PROVIDERS
Route::get('/providers', [ProviderController::class, 'index'])->name('providers.index');
Route::get('/providers/{id}', [ProviderController::class, 'show'])->name('providers.show');


//ADMIN
Route::middleware('superuser')->group(function () {

    Route::get('/productos/nuevo', [ProductController::class, 'create'])->name('productos.create');
    Route::post('/productos/store', [ProductController::class, 'store'])->name('productos.store');
    Route::get('/productos/edit', [ProductController::class, 'create'])->name('productos.edit');
    Route::post('/productos/update/{id}', [ProductController::class, 'update'])->name('productos.update');
    Route::delete('/productos/delete/{id}', [ProductController::class, 'destroy'])->name('productos.destroy');

    Route::get('/providers/nuevo', [ProviderController::class, 'create'])->name('providers.create');
    Route::post('/providers/store', [ProviderController::class, 'store'])->name('providers.store');
    Route::get('/providers/edit', [ProviderController::class, 'create'])->name('providers.edit');
    Route::post('/providers/update/{id}', [ProviderController::class, 'update'])->name('providers.update');
    Route::delete('/providers/delete/{id}', [ProviderController::class, 'destroy'])->name('providers.destroy');

});

require __DIR__.'/auth.php';

