<?php

use App\Http\Controllers\superadmin\RolePermissionController;
use App\Http\Controllers\superadmin\SuperadminController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [SuperadminController::class, 'dashboard'])->name('dashboard');
Route::get('permission', [RolePermissionController::class,'permission'])->name('permission');