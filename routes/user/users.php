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
Route::get('/users/', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy'); //info This allows users to delete users in the admin area


Route::middleware('auth')->group(function() {

//Route::get('/', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
//Route::put('/users/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');
//Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
});

//Route::middleware(['can:view,user','auth'])->group(function(){
//Route::get('/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');

//});

//Route::middleware(['role:Admin,Manager,Owner'])->group(function(){
//    Route::put('/users/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');
//    Route::put('/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');
//});
