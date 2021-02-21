<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')->group(function() {

    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
    Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
    Route::delete('/roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy');

    Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
    Route::put('/roles/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');

    Route::put('/roles/{role}/attach', [App\Http\Controllers\RoleController::class, 'permission_attach'])->name('role.permission.attach');
    Route::put('/roles/{role}/detach', [App\Http\Controllers\RoleController::class, 'permission_detach'])->name('role.permission.detach');
});
