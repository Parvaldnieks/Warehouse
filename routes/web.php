<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Updated dashboard route
Route::get('/dashboard', [ItemController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Group item routes and make route names consistent
Route::prefix('items')->name('items.')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('index');
    Route::get('/create', [ItemController::class, 'create'])->name('create');
    Route::post('/', [ItemController::class, 'store'])->name('store');
    Route::get('/{item}/edit', [ItemController::class, 'edit'])->name('edit');
    Route::put('/{item}', [ItemController::class, 'update'])->name('update');
    Route::delete('/{item}', [ItemController::class, 'destroy'])->name('destroy');
    Route::get('/{item}', [ItemController::class, 'show'])->name('show');
});

// Order routes
// Order routes
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::resource('orders', OrderController::class)->only(['index', 'store', 'show']);
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

// Create new category route
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

require __DIR__ . '/auth.php';
