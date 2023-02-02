<?php

use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\customer\PermissionController;
use App\Http\Controllers\customer\ProfileController;
use App\Http\Controllers\customer\PropertyController;
use App\Http\Controllers\customer\RoleController;
use App\Http\Controllers\customer\RolePermissionController;
use App\Http\Controllers\customer\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
Route::group(['prefix' => 'role-permission', 'as' => 'role-permission.','middleware'=>['permission:role,customer','permission:permission,customer']], function(){
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::post('fetch-permissions', [RolePermissionController::class, 'fetch_permission'])->name('fetch-permissions');
    Route::post('assign-permission', [RolePermissionController::class, 'assign_permission'])->name('assign-permission');
    Route::get('fetch-role', [RoleController::class, 'fetch_role'])->name('fetch-role');
    Route::get('role-has-permission', [RolePermissionController::class, 'role_has_permission'])->name('role-has-permission');
    //Assign all customer permission to customer
    Route::get('permission-assing', [RoleController::class, 'assign_permission']);
});
//Route for User
Route::resource('user', UserController::class)->name('user','');

//Route for Profile
Route::resource('profile',ProfileController::class)->name('profile','');

//Route for Property
Route::resource('property',PropertyController::class)->middleware('permission:property,customer');

//Route for Activate User
Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('/isactive/{id}',[UserController::class,'is_active'])->name('active-user');
    });