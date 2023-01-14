<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
 Route::group(['prefix' => 'role-permission', 'as' => 'role-permission.'], function(){
    Route::resource('role', RoleController::class)->name('role','');
    Route::resource('permission', PermissionController::class)->name('permission','');
    Route::get('role-has-permission', [RolePermissionController::class, 'role_has_permission'])->name('role-has-permission');
});