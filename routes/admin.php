<?php

use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SubscriptionController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
// Group Route for role and permission
 Route::group(['prefix' => 'role-permission', 'as' => 'role-permission.'], function(){
    Route::resource('role', RoleController::class)->name('role','');
    Route::resource('permission', PermissionController::class)->name('permission','');
    Route::get('role-has-permission', [RolePermissionController::class, 'role_permission'])->name('role-has-permission');
    Route::post('fetch-permissions', [RolePermissionController::class, 'fetch_permission'])->name('fetch-permissions');
    Route::post('assign-permission', [RolePermissionController::class, 'assign_permission'])->name('assign-permission');
    Route::get('fetch-role', [RoleController::class, 'fetch_role'])->name('fetch-role');
    Route::get('customer-has-permission', [RoleController::class, 'fetch_role'])->name('customer-has-permission');
});
Route::group(['prefix' => 'subscription', 'as' => 'subscription.'], function(){
Route::resource('subscription', SubscriptionController::class)->name('subscription','');
Route::get('/islimit/{id}',[SubscriptionController::class,'is_limit'])->name('limit');
Route::get('/islife-time/{id}',[SubscriptionController::class,'is_life_time'])->name('life-time');
});


Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
Route::resource('user', UserController::class)->name('user','');
//Route for Activate User
Route::get('/isactive/{id}',[UserController::class,'is_active'])->name('active-user');
});

//Route for Profile
 Route::resource('profile',ProfileController::class)->name('profile','');
Route::get('permission-assing', [RoleController::class, 'assign_permission']);

//Route for Customer
Route::resource('customer',CustomerController::class)->name('customer','');

//Route for Profile
 Route::resource('profile',ProfileController::class)->name('profile','');

 Route::get('get-states/{id}', [Helper::class, 'getStateByCountry']);
