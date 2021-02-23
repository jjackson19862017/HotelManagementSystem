<?php
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission.index');
    Route::post('/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('permission.store');
    Route::delete('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permission.destroy'); //info This allows users to delete posts in the admin area
    Route::get('/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permission.edit');

    Route::put('/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permission.update');
});
