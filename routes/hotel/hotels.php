<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/hotels/', [App\Http\Controllers\HotelController::class, 'index'])->name('hotel.index');
Route::post('/hotels', [App\Http\Controllers\HotelController::class, 'store'])->name('hotel.store');
Route::delete('/hotels/{hotel}', [App\Http\Controllers\HotelController::class, 'destroy'])->name('hotel.destroy'); //info This allows hotels to delete hotels in the admin area
