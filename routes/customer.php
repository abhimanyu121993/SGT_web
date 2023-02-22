<?php

use App\Http\Controllers\customer\CheckpointController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\customer\PermissionController;
use App\Http\Controllers\customer\ProfileController;
use App\Http\Controllers\customer\PropertyController;
use App\Http\Controllers\customer\RoleController;
use App\Http\Controllers\customer\RolePermissionController;
use App\Http\Controllers\customer\RootController;
use App\Http\Controllers\customer\RouteController;
use App\Http\Controllers\customer\SecurityGuardController;
use App\Http\Controllers\customer\ShiftController;
use App\Http\Controllers\customer\TaskController;
use App\Http\Controllers\customer\UserController;
use App\Models\SecurityGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => 'role-permission', 'as' => 'role-permission.','middleware'=>['permission:role,customer','permission:permission,customer']], function(){
    Route::resource('role', RoleController::class)->name('role','');
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

Route::group(['prefix' => 'property', 'as' => 'property.'], function(){
Route::get('add-checkpoint/{id}',[CheckpointController::class,'addcheckpoint'])->name('add-checkpoint');

});
//Route for Security Guard
Route::resource('secuirty-guard', SecurityGuardController::class)->name('guard','')->middleware('permission:security guard,customer');
//Route for Activate User
Route::group(['prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('/isactive/{id}',[UserController::class,'is_active'])->name('active-user');
    });

    Route::group(['prefix' => 'security-guard', 'as' => 'security-guard.'], function(){
        Route::post('/status',[SecurityGuardController::class,'status'])->name('status');
        });

// Give all permmission to customer which are logged In
Route::get('/all-permissions', function () {
    $permissions = Permission::where('guard_name', 'customer')->pluck('name');
    Auth::guard('customer')->user()->syncPermissions($permissions);
});

Route::get('/guard-permission', function () {
    $permissions = Permission::where('guard_name', 'security_guard')->pluck('id');
    $guard = SecurityGuard::find(2);
    $guard->givePermissionTo($permissions);
});
//Route for Task Management
Route::resource('task',TaskController::class)->middleware('permission:task,customer');
//Route for Activate Task
Route::group(['prefix' => 'task', 'as' => 'task.'], function(){
    Route::get('/isactive/{id}',[TaskController::class,'is_active'])->name('active-task');
    });
//Route for Checkpoint Management
Route::resource('checkpoint',CheckpointController::class)->middleware('permission:checkpoint,customer');
Route::group(['prefix' => 'checkpoint', 'as' => 'checkpoint.'], function(){
Route::post('/status',[CheckpointController::class,'status'])->name('status');
    });
Route::resource('route',RouteController::class)->name('route','');

//Route for Route Management
Route::group(['prefix' => 'route', 'as' => 'route.'], function(){
Route::post('checkpoint-in-property', [RouteController::class, 'checkpoint_in_property'])->name('checkpoint-in-property');
Route::get('show-route/{id}',[RouteController::class,'show_route'])->name('show-route');
Route::get('/isactive/{id}',[RouteController::class,'is_active'])->name('active-route');
});
//Route for Shift
Route::resource('shift',ShiftController::class)->name('shift','');
Route::group(['prefix' => 'shift', 'as' => 'shift.'], function(){
    Route::get('/isactive/{id}',[ShiftController::class,'is_active'])->name('active-shift');
});

Route::post('update-password',[SecurityGuardController::class,'update_password'])->name('update-password');
