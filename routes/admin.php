<?php

use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\RolePermissionController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SubscriptionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
// Group Route for role and permission
 Route::group(['prefix' => 'role-permission', 'as' => 'role-permission.'], function(){
    Route::resource('role', RoleController::class)->name('role','')->middleware(['permission:role,admin']);
    Route::resource('permission', PermissionController::class)->name('permission','')->middleware(['permission:permission,admin']);
    Route::get('role-has-permission', [RolePermissionController::class, 'role_permission'])->name('role-has-permission')->middleware(['permission:permission_read|role:role_read,admin']);
    Route::post('fetch-permissions', [RolePermissionController::class, 'fetch_permission'])->name('fetch-permissions')->middleware(['permission:permission_read|role:role_read,admin']);
    Route::post('assign-permission', [RolePermissionController::class, 'assign_permission'])->name('assign-permission')->middleware(['permission:permission_edit,admin']);
    Route::get('fetch-role', [RoleController::class, 'fetch_role'])->name('fetch-role')->middleware(['role:role_read,admin']);
    Route::get('customer-has-permission', [RoleController::class, 'fetch_role'])->name('customer-has-permission');
});
Route::resource('subscription', SubscriptionController::class)->name('subscription','')->middleware(['permission:subscription,admin']);
Route::group(['prefix' => 'subscription', 'as' => 'subscription.'], function(){
Route::get('/islimit/{id}',[SubscriptionController::class,'is_limit'])->name('limit')->middleware(['permission:subscription_edit,admin']);
Route::get('/islife-time/{id}',[SubscriptionController::class,'is_life_time'])->name('life-time')->middleware(['permission:subscription_edit,admin']);
});

Route::resource('user', UserController::class)->name('user','')->middleware(['permission:user,admin']);
Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
//Route for Activate User
Route::get('/isactive/{id}',[UserController::class,'is_active'])->name('active-user')->middleware(['permission:user_edit,admin']);
});
//Route for Activate Customer
Route::group(['prefix' => 'customer', 'as' => 'customer.'], function(){
Route::get('/isactive/{id}',[CustomerController::class,'is_active'])->name('active-customer')->middleware(['permission:customer_edit,admin']);
    Route::get('/permissions/{id}',[CustomerController::class,'customer_has_permissions'])->name('customer-has-permission');
    Route::post('assign-permission', [CustomerController::class,'assign_permission_to_customer'])->name('assign-permission');
});

//Route for Profile
Route::resource('profile', ProfileController::class)->name('profile', '');
// Route::get('permission-assing', [RoleController::class, 'assign_permission']);

//Route for Customer Crud
Route::resource('customer',CustomerController::class)->name('customer','')->middleware(['permission:customer,admin']);
 Route::get('get-states/{id}', [Helper::class, 'getStateByCountry']);

