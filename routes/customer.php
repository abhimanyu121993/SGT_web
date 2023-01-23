<?php

use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\customer\PermissionController;
use App\Http\Controllers\customer\PropertyController;
use App\Http\Controllers\customer\RoleController;
use App\Http\Controllers\customer\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
Route::group(['prefix' => 'role-permission', 'as' => 'role-permission.'], function(){
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::get('role-has-permission', [RolePermissionController::class, 'role_has_permission'])->name('role-has-permission');
});

//Route for Profile
Route::resource('profile',ProfileController::class)->name('profile','');

//Route for Property
Route::resource('property',PropertyController::class);
