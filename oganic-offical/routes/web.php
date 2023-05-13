<?php

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
// number_format()
Auth::routes();

Route::middleware(['auth'])->group(function () {
   Route::get('/order/user', [App\Http\Controllers\HomeController::class, 'order'])->name('home.order');
   Route::post('/contactPost', [App\Http\Controllers\HomeController::class, 'contactPost'])->name('home.contactPost');
   Route::middleware(['checkrole:admin'])->group(function () {
      Route::get('/dashboard',[App\Http\Controllers\AdminController::class,'index'])->name('admin.dashboard');
      Route::get('/newOrder',[App\Http\Controllers\OrderController::class,'view'])->name('order.view');
      Route::resources([
         'category'=>CategoryController::class,
         'product'=>ProductController::class,
         'user'=>UserController::class
      ]);
   });
   Route::resources([
      'order'=>OrderController::class
   ]);
});
Route::get('/shop/{id}',[App\Http\Controllers\CartsController::class,'addToCart'])->name('addToCart');
Route::get('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('home.shop');
Route::get('/sort', [App\Http\Controllers\HomeController::class, 'sort'])->name('home.sort');
Route::get('/introduce', [App\Http\Controllers\HomeController::class, 'introduce'])->name('home.introduce');
Route::get('/show/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('home.show');
Route::get('/display', [App\Http\Controllers\HomeController::class, 'display'])->name('home.display');
Route::get('/filterCate', [App\Http\Controllers\HomeController::class, 'cateFilter'])->name('home.cateFilter');
Route::post('/filter', [App\Http\Controllers\HomeController::class, 'filter'])->name('home.filtered');
Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('home.search');
Route::post('/vote', [App\Http\Controllers\HomeController::class, 'vote'])->name('home.vote');
Route::get('/searchAjax', [App\Http\Controllers\HomeController::class, 'searchAjax'])->name('home.searchAjax');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');
Route::get('/destroy/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('home.destroy');
Route::get('/carts', [App\Http\Controllers\CartsController::class, 'showCart'])->name('home.carts');
Route::get('/carts-update', [App\Http\Controllers\CartsController::class, 'updateCart'])->name('cart.update');
Route::get('/carts-delete', [App\Http\Controllers\CartsController::class, 'deleteCart'])->name('cart.delete');

// Route::get('/check', [App\Http\Controllers\AdminController::class, 'check'])->name('dataChart');