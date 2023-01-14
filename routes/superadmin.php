<?php
use App\Http\Controllers\superadmin\PermissionController;
use App\Http\Controllers\superadmin\RoleController;
use App\Http\Controllers\superadmin\RolePermissionController;
use App\Http\Controllers\superadmin\SuperadminController;
use App\Http\Controllers\superadmin\TranslationController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [SuperadminController::class, 'dashboard'])->name('dashboard');
Route::group(['prefix' => 'role-permission', 'as' => 'role-permission.'], function(){
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::get('role-has-permission', [RolePermissionController::class, 'role_has_permission'])->name('role-has-permission');
});

Route::resource('translation', TranslationController::class);
