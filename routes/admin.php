<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
// Group Route for role and permission 
 Route::group(['prefix' => 'role-permission', 'as' => 'role-permission.'], function(){
    Route::resource('role', RoleController::class)->name('role','');
    Route::resource('permission', PermissionController::class)->name('permission','');
    Route::get('role-has-permission', [RolePermissionController::class, 'role_permission'])->name('role-has-permission');
    Route::post('fetch-permissions', [RolePermissionController::class, 'fetch_permission'])->name('fetch-permissions');
    Route::get('fetch-role', [RoleController::class, 'fetch_role'])->name('fetch-role');
});
Route::resource('subscription', SubscriptionController::class)->name('subscription','');
