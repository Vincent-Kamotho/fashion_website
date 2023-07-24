<?php

use App\Http\Controllers\StockController;
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
Route::get('/', [App\Http\Controllers\StockController::class, 'index'])->name('view-page');
// Route::get('/', function () {
//     return view('index');
// })->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/stock', [App\Http\Controllers\StockController::class, 'view'])->name('stock');
Route::get('manage-stock', [App\Http\Controllers\StockController::class, 'create'])->name('manage-stock');
Route::post('save-stock', [App\Http\Controllers\StockController::class, 'store'])->name('save-stock');
Route::get('stock/edit/{id}', [App\Http\Controllers\StockController::class,'edit']);
Route::post('stock/update/{id}', [App\Http\Controllers\StockController::class,'update']);
Route::get('stock/delete/{id}', [App\Http\Controllers\StockController::class, 'destroy']);
