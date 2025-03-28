<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
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

Route::view('/test', 'temp-view');

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::controller(ProductController::class)->group(function () {
        Route::get   ('products',             'index')   -> name('products.index');
        Route::get   ('products/create',      'create')  -> name('products.create');
        Route::post  ('products',             'store')   -> name('products.store');
        Route::get   ('products/{product:slug}',      'show')    -> name('products.show');
        Route::get   ('products/{product:slug}/edit', 'edit')    -> name('products.edit');
        Route::put   ('products/{product:slug}',      'update')  -> name('products.update');
        Route::delete('products/{product:slug}',      'destroy') -> name('products.destroy');
    });
});