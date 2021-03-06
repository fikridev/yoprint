<?php

use App\Http\Controllers\OrderController;
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


Route::resource('/', OrderController::class);
Route::get('/order-list',[ OrderController::class, 'orderList'])->name('order-lists');
Route::post('/import-csv',[ OrderController::class, 'importCSV'])->name('importCSV');
