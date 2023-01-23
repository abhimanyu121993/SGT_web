<?php

use App\Helpers\Helper;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Auth::guard('superadmin')->check();
    return redirect()->route('auth.admin');
});

Route::controller(ChatController::class)->prefix('chat')->as('chat.')->group(function () {
    Route::get('list', 'list')->name('list');
    Route::post('single-chat', 'single_chat')->name('single-chat');
});
// Group Route for superadmin, Admin, Customer Login view and Logic
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('superadmin', [AuthController::class, 'superadmin'])->name('superadmin');
    Route::post('superadmin-login', [AuthController::class, 'superadmin_login'])->name('superadmin-login');
    Route::get('admin', [AuthController::class, 'admin'])->name('admin');
    Route::post('admin-login', [AuthController::class, 'admin_login'])->name('admin-login');
    Route::get('customer', [AuthController::class, 'customer'])->name('customer');
    Route::post('customer-login', [AuthController::class, 'customer_login'])->name('customer-login');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

//General route for country/state/city
Route::group([
    'prefix' => 'general',
    'as' => 'general.'],
    function () {
        Route::post('states-in-country', [GeneralController::class, 'states_in_country'])->name('states-in-country');
});
