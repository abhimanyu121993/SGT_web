<?php

use App\Helpers\Helper;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestingController;

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
    // return Auth::guard('superadmin')->check();
    return redirect()->route('auth.admin');
})->name('home');


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
    //  Route for change Password
    Route::post('update-password', [AuthController::class, 'update_password'])->name('update-password');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    //Lock Screen
    Route::get('lock', [AuthController::class, 'lock'])->name('lock');
    //Create Password
    Route::get('admin-create-password/{token}/{email}',[AuthController::class,'admin_create_password'])->name('admin-create-password');
    Route::post('admin-create-password',[AuthController::class,'admin_create_password_code'])->name('admin-create-password');
    Route::get('customer-create-password/{token}/{email}',[AuthController::class,'customer_create_password'])->name('customer-create-password');
    Route::post('customer-create-password',[AuthController::class,'customer_create_password_code'])->name('customer-create-password');
});
//General route for country/state/city
Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
    Route::post('states-in-country', [GeneralController::class, 'states_in_country'])->name('states-in-country');
    Route::post('cities-in-state', [GeneralController::class, 'cities_in_state'])->name('cities-in-state');
});

Route::group(['prefix' => '/test', 'as' => 'test',], function () {

    
    Route::get('/activitylog', function () {
        return view('activitylog');
    });

});



Route::group(['prefix'=>'test','as'=>'testproject'],function(){


Route::get('activity',function(){
return view('test.activity');

})->name('trial');


Route::get('leave',function(){

return view('test.leaveRequest');

})->name('holiday');


Route::get('timesheet',function(){
                return view('test.timesheet');
})->name('time');


    Route::get('/mydesign', function () {
        return view('mydesign');
    });
    Route::get('/testlog', function () {
        return view('test.activity');
    });

    Route::get('general-report', [TestingController::class, 'generalReport']);
    Route::get('new-general-report',[TestingController::class, 'NewgeneralReport']);
    Route::get('track-guard', [TestingController::class, 'trackGuard']);

    
    
   
  Route::get('/email', function(){
  
      return view('test.email');


  });


});






