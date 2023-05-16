<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'home'])->name('main');

Route::get('/contacts', [MainController::class, 'contacts'])->name('contacts');

Route::post('/send-email', [MainController::class, 'send']);

Route::resource('/admin/categories', CategoryController::class);
Route::resource('/admin/products', ProductController::class);
