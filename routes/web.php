<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AdminController;
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

// Route::view('/', 'front.index');
Route::get('/', [HomeController::class,'show']);
Route::get('/find', [HomeController::class,'find']);
Route::post('/admin/buy', [OrdersController::class,'buy']);


################ Admin Panel ################

Route::prefix('/admin')->group(function(){
    Route::get('/dashLogin',[AdminController::class,'dashLogin']);

    Route::get('/panel',[AdminController::class,'dashboard']);

    Route::post('/panel',[AdminController::class,'login']);

    Route::post('/logout',[AdminController::class,'logout']);

    Route::get('/orders',[OrdersController::class,'show']);

    Route::post('/delete-order/{id}',[OrdersController::class,'delete']);

    Route::get('/medicines',[MedicineController::class,'show']);

    Route::get('/search',[MedicineController::class,'find']);

    Route::post('/edit/{id}',[MedicineController::class,'edit']);

    Route::post('/delete/{id}',[MedicineController::class,'delete']);

    Route::get('/admins',[AdminController::class,'showAdmin']);

    Route::post('/deleteAdmin/{id}',[AdminController::class,'delete']);

    Route::get('/add-admin',[AdminController::class,'addAdmin']);

    Route::post('/add-admin',[AdminController::class,'add']);

    Route::post('/add-medicine', [MedicineController::class,'add']);

});
