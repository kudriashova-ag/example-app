<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \UniSharp\LaravelFilemanager\Lfm;
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

Route::get('/category/{category:slug}', [MainController::class, 'category']);
Route::get('/product/{product:slug}', [MainController::class, 'product']);


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
  Route::resource('categories', CategoryController::class);
  Route::resource('products', ProductController::class);
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
  Lfm::routes();
});


Auth::routes();
