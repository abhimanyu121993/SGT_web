<?php

use App\Http\Controllers\v1\ApiAuthController;
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
Route::post('login', [ApiAuthController::class,'guard']);
Route::get('user', [ApiAuthController::class, 'logged_in']);
Route::get('logout', [ApiAuthController::class, 'logged_out']);

