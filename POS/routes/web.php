<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::resources(['product' => App\Http\Controllers\ProductController::class]);
Route::resources(['category' => App\Http\Controllers\CategoryController::class]);

Route::get('/api/products', [App\Http\Controllers\ProductController::class, 'api'])->name('api.product');


