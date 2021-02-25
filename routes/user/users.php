<?php

use App\Models\User;
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
Route::post('/users/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy'); //info This allows users to delete users in the admin area

Route::put('/users/{user}/update/username', [App\Http\Controllers\UserController::class, 'usernameUpdate'])->name('user.update.username');
Route::put('/users/{user}/update/name', [App\Http\Controllers\UserController::class, 'nameUpdate'])->name('user.update.name');
Route::put('/users/{user}/update/email', [App\Http\Controllers\UserController::class, 'emailUpdate'])->name('user.update.email');
Route::put('/users/{user}/update/role', [App\Http\Controllers\UserController::class, 'roleUpdate'])->name('user.update.role');
Route::put('/users/{user}/update/password', [App\Http\Controllers\UserController::class, 'passwordUpdate'])->name('user.update.password');

Route::get('/users/trashed', [App\Http\Controllers\UserController::class, 'trashedIndex'])->name('trashed.user.index');

Route::get('/users/restore/{user}', [App\Http\Controllers\UserController::class, 'restoreUser'])->name('user.restore'); //info This allows users to restore users in the admin area
Route::get('/users/trashed/{user}', [App\Http\Controllers\UserController::class, 'eraseUser'])->name('user.erase'); //info This allows users to erase users in the admin area

Route::get('/users/{user}/profile', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile.show');


Route::middleware('auth')->group(function() {

//Route::get('/', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');
//Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
});

//Route::middleware(['can:view,user','auth'])->group(function(){

//});

//Route::middleware(['role:Admin,Manager,Owner'])->group(function(){
//    Route::put('/users/{user}/attach', [App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');
//    Route::put('/users/{user}/detach', [App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');
//});
