<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
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
Route::prefix('/')->name('client.')->group(function (){
    Route::get('/', function () {
        return view('client.homepage');
    })->name('home');
    Route::get('/shop',[Controller::class,'index'])->name('shop');
    Route::post('/update-status-order/{order}',[Controller::class,'updateStatusOrder'])->name('updateStatusOrder');
    Route::post('/cancel-order/{order}',[Controller::class,'cancelOrder'])->name('cancelOrder');
    Route::post('/order',[Controller::class,'postOrder'])->name('postOrder');
    Route::get('/order',[Controller::class,'getOrder'])->name('getOrder');
    Route::get('/order-detail/{detail}',[Controller::class,'detailOrder'])->name('detailOrder');
    Route::get('/cart',[Controller::class,'getCart'])->name('getCart');
    Route::post('/cart',[Controller::class,'postCart'])->name('postCart');
    Route::post('/filter',[Controller::class,'filter'])->name('filter');
    Route::get('/cart/delete/{cart}',[Controller::class,'deleteCart'])->name('deleteCart');
    Route::get('/shop/search',[Controller::class,'search'])->name('search');
    Route::get('/product/{product}',[Controller::class,'detail_product'])->name('product');
    Route::post('/comment',[Controller::class,'postComment'])->name('postComment');
});
Route::middleware('guest')->prefix('form')->name('form.')->group(function (){
    Route::get('/login',[Controller::class,'getLogin'])->name('getLogin');
    Route::post('/login',[Controller::class,'postLogin'])->name('postLogin');
    Route::get('/register',[Controller::class,'getRegister'])->name('getRegister');
    Route::post('/register',[Controller::class,'postRegister'])->name('postRegister');
});
Route::middleware('check')->prefix('/products')->name('products.')->group(function (){
    Route::get('/',[ProductController::class,'index'])->name('list');
    Route::get('/create',[ProductController::class,'create'])->name('create');
    Route::post('/store',[ProductController::class,'store'])->name('store');
    Route::delete('/delete-all',[ProductController::class,'delete_all'])->name('delete-all');
    Route::get('/edit/{product}',[ProductController::class,'edit'])->name('edit');
    Route::put('/update/{product}',[ProductController::class,'update'])->name('update');
    Route::get('/change-status/{product}',[ProductController::class,'changeStatus'])->name('change-status');
});
Route::middleware('check')->prefix('/users')->name('users.')->group(function (){
    Route::get('/list',[UserController::class,'index'])->name('list');
    Route::get('/create',[UserController::class,'create'])->name('create');
    Route::post('/store',[UserController::class,'store'])->name('store');
    Route::delete('/delete-all',[UserController::class,'delete_all'])->name('delete-all');
    Route::get('/edit/{user}',[UserController::class,'edit'])->name('edit');
    Route::put('/update/{user}',[UserController::class,'update'])->name('update');
    Route::get('/change-status/{user}',[UserController::class,'changeStatus'])->name('change-status');
});
Route::middleware('check')->prefix('/sectors')->name('sectors.')->group(function (){
    Route::get('/list',[SectorController::class,'index'])->name('list');
    Route::get('/create',[SectorController::class,'create'])->name('create');
    Route::post('/store',[SectorController::class,'store'])->name('store');
    Route::delete('/delete-all',[SectorController::class,'delete_all'])->name('delete-all');
    Route::get('/edit/{sector}',[SectorController::class,'edit'])->name('edit');
    Route::put('/update/{sector}',[SectorController::class,'update'])->name('update');
});
Route::middleware('check')->prefix('/sizes')->name('sizes.')->group(function (){
    Route::get('/list',[SizeController::class,'index'])->name('list');
    Route::get('/create',[SizeController::class,'create'])->name('create');
    Route::post('/store',[SizeController::class,'store'])->name('store');
    Route::delete('/delete-all',[SizeController::class,'delete_all'])->name('delete-all');
    Route::get('/edit/{size}',[SizeController::class,'edit'])->name('edit');
    Route::put('/update/{size}',[SizeController::class,'update'])->name('update');
});
Route::middleware('check')->prefix('/orders')->name('orders.')->group(function (){
    Route::get('/list',[OrderController::class,'index'])->name('list');
    Route::delete('/delete-all',[OrderController::class,'delete_all'])->name('delete-all');
    Route::get('/edit/{order}',[OrderController::class,'edit'])->name('edit');
    Route::put('/update/{order}',[OrderController::class,'update'])->name('update');
    Route::get('/detail/{order}',[OrderController::class,'detail'])->name('detail');
    Route::get('/detail/{order}',[OrderController::class,'detail'])->name('detail');
    Route::delete('/detail/order-cancel',[OrderController::class,'orderCancel'])->name('cancelAll');
});
Route::middleware('check')->prefix('/dashboard')->name('dashboard.')->group(function (){
    Route::get('/',[DashboardController::class,'index'])->name('list');
    Route::post('/',[DashboardController::class,'search'])->name('list');
});
Route::get('/logout', [Controller::class, 'logout']);

