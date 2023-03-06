<?php

use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\v1\ApiAuthController;
use App\Http\Controllers\v1\GeneralController;
use App\Http\Controllers\v1\guard\ProfileController as GuardProfileController;
use App\Http\Controllers\v1\guard\LeaveController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
    
    Route::get('user', [ApiAuthController::class, 'logged_in']);
    Route::get('logout', [ApiAuthController::class, 'logged_out']);
    Route::post('change-password',[ApiAuthController::class,'change_password'])->middleware('can:profile');
    Route::apiResource('leave-guard', LeaveController::class)->middleware('can:leave');
    Route::post('guard-properties',[GuardProfileController::class,'guard_properties'])->middleware('can:profile');
    Route::post('guard-properties-details',[GuardProfileController::class,'guard_properties_details'])->middleware('can:profile');
    Route::post('guard-properties-checkpoints',[GuardProfileController::class,'guard_properties_checkpoints'])->middleware('can:profile');

    //Profile Routes
    Route::group(['prefix'=>'profile','as'=>'profile.','middleware'=>'ability:profile,profile_edit'],function(){
        Route::post('update-image',[GuardProfileController::class,'profile_image']);
        Route::post('update-detail',[GuardProfileController::class,'update_profile']);
    });
}); // use ability for any of multiple abilities , use abilities for all from multiple abilities 

Route::group(['prefix'=>'general','as'=>'general.'],function(){
Route::post('get-city',[GeneralController::class,'city']);
Route::post('get-country',[GeneralController::class,'country']);
Route::post('get-state',[GeneralController::class,'state']);
Route::post('get-timezone',[GeneralController::class,'time_zone']);
});