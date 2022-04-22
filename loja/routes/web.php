<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminProductController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/product/{product}', [ProductController::class, 'show'])->name('product');

// pesquisando o model product por outro campo da tabela
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product');

// ADMIN
Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');

Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');

Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

Route::get('/admin/products/{product}/delete-image', [AdminProductController::class, 'destroyImage'])->name('admin.products.destroyImage');
