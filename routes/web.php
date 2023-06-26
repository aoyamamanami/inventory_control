<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(AdminController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/products', 'store')->name('store');
    Route::get('/products/create', 'create')->name('create');
    Route::get('/products/edit','edit')->name('edit');
    Route::get('/products/{product}', 'edit')->name('edit');
    Route::put('/products/{product}', 'update')->name('update');
    Route::delete('products/{product}', 'delete')->name('delete');
    Route::get('/charts/chart', 'chart')->name('chart');
    Route::get('/categories/categoryEdit', 'categoryEdit')->name('categoryEdit');
    Route::post('/categories', 'categoryStore')->name('categoryStore');
    Route::get('/categories/categoryCreate', 'categoryCreate')->name('categoryCreate');
    Route::delete('categories/{category}', 'categoryDelete')->name('categoryDelete');
});

// Route::get('/categories/{category}', [CategoryController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
