<?php

use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\v1\ApiAuthController;
use App\Http\Controllers\v1\guard\ProfileController as GuardProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Auth login for guard and property owner
Route::post('login', [ApiAuthController::class, 'guard']);
Route::get('user', [ApiAuthController::class, 'logged_in']);
Route::get('logout', [ApiAuthController::class, 'logged_out']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('leave-guard', LeaveController::class)->middleware('can:leave');
    Route::post('profile-image',[GuardProfileController::class,'profile_image'])->middleware('can:profile');
    Route::post('update-profile',[GuardProfileController::class,'update_profile'])->middleware('can:profile');
    Route::post('city',[GuardProfileController::class,'city'])->middleware('can:profile');
    Route::post('country',[GuardProfileController::class,'country'])->middleware('can:profile');
    Route::post('state',[GuardProfileController::class,'state'])->middleware('can:profile');
    Route::post('change-password',[GuardProfileController::class,'change_password'])->middleware('can:profile');
    Route::post('guard-properties',[GuardProfileController::class,'guard_properties'])->middleware('can:profile');
    Route::post('guard-properties-details',[GuardProfileController::class,'guard_properties_details'])->middleware('can:profile');
    Route::post('guard-properties-checkpoints',[GuardProfileController::class,'guard_properties_checkpoints'])->middleware('can:profile');
});

