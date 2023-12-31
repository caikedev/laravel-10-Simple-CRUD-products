<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
           // endpoint  Controller                  método do controller
Route::get('/product', [ProductController::Class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::Class, 'create'])->name('product.create');
Route::post('/product', [ProductController::Class, 'store'])->name('product.store');
Route::get('/product/{p}/edit', [ProductController::Class, 'edit'])->name('product.edit');
Route::put('/product/{p}/update', [ProductController::Class, 'update'])->name('product.update');
Route::delete('/product/{p}/destroy', [ProductController::Class, 'destroy'])->name('product.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
