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
Route::get('/hotels/{hotel}/edit', [App\Http\Controllers\HotelController::class, 'edit'])->name('hotel.edit');
Route::put('/hotels/{hotel}/update', [App\Http\Controllers\HotelController::class, 'update'])->name('hotel.update');

Route::get('/hotels/trashed', [App\Http\Controllers\HotelController::class, 'trashedIndex'])->name('trashed.hotel.index');

Route::get('/hotels/restore/{hotel}', [App\Http\Controllers\HotelController::class, 'restoreHotel'])->name('hotel.restore'); //info This allows users to restore Hotels in the admin area
Route::get('/hotels/trashed/{hotel}', [App\Http\Controllers\HotelController::class, 'eraseHotel'])->name('hotel.erase'); //info This allows users to erase Hotels in the admin area
