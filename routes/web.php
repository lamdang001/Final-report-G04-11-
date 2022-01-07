<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Web
Route::namespace('App\Http\Controllers\Web')->group(function () {
    Route::group(['as' => 'web.'], function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/home', 'HomeController@home')->name('top');
        Route::get('/login', 'AuthController@showLoginForm')->name('auth.login');
        Route::post('login', 'AuthController@handleLogin')->name('auth.handleLogin');
        Route::get('/register', 'AuthController@showRegisterForm')->name('auth.register');
        Route::post('register', 'AuthController@handleRegister')->name('auth.handleRegister');
        Route::get('/logout', 'AuthController@logout')->name('auth.logout');
        Route::get('/search','HomeController@search');
        Route::group(['middleware' => 'check.user.login'], function() {
            Route::get('/edit/customer/{id}', 'UserController@showEditForm')->name('edit.form');
            Route::post('/edit/customer/{id}', 'UserController@handleEditUser')->name('edit.user');
            Route::get('/edit/order/{id}', 'OrderController@showEditOrderForm')->name('edit.order.form');
            Route::post('/edit/order/{id}', 'OrderController@handleEditOrder')->name('edit.order');
            Route::get('/cancle/order/{id}', 'OrderController@cancleOrder')->name('cancle.order');
            Route::get('/orders/{id}', 'OrderController@showMyOrders')->name('orders');
            Route::get('/order/detail/{id}', 'OrderController@showOrderDetail')->name('order.detail');
            Route::post('/pay','OrderController@pay')->name('pay');
            Route::get('/continue_second','HomeController@continueSecond');
            Route::get('/continue_third','HomeController@continueThird');
            Route::get('/continue_fourth','HomeController@continueFourth');
        });
    });
});

// Admin
Route::namespace('App\Http\Controllers\Admin')->prefix('ad')->group(function () {
    Route::get('/', function () {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('user.list');
        } else {
            return redirect()->route('admin.form.login');
        }
    });
    // Login, logout
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.form.login');
    Route::post('/login', 'LoginController@login')->name('admin.handle.login');
    Route::get('/logout', 'LoginController@logout')->name('admin.handle.logout');

    Route::group(['middleware' => 'check.admin.login'], function() {
        Route::get('dashboard','DashboardController@index')->name('dashboard');
        // Staff
        Route::group(['prefix'=>'staff'],function(){
            Route::get('list','StaffController@index')->name('staff.list');
            Route::get('create','StaffController@create')->name('staff.create.form');
            Route::post('create','StaffController@store')->name('staff.create');
            Route::get('edit/{id}','StaffController@edit')->name('staff.edit.form');
            Route::post('edit/{id}','StaffController@update')->name('staff.edit');
            Route::get('delete/{id}','StaffController@destroy')->name('staff.delete');
        });
        // User
        Route::group(['prefix'=>'user'],function(){
            Route::get('list','UserController@index')->name('user.list');
        });
        // Schedule
        Route::group(['prefix'=>'schedule'],function(){
            Route::get('list','ScheduleController@index')->name('schedule.list');
            Route::get('create','ScheduleController@create')->name('schedule.create.form');
            Route::post('create','ScheduleController@store')->name('schedule.create');
            Route::get('edit/{id}','ScheduleController@edit')->name('schedule.edit.form');
            Route::post('edit/{id}','ScheduleController@update')->name('schedule.edit');
            Route::get('delete/{id}','ScheduleController@destroy')->name('schedule.delete');
            Route::get('show/{id}','ScheduleController@show')->name('schedule.show');
        });
        // Orders
        Route::group(['prefix'=>'order'],function(){
            Route::get('list','OrderController@index')->name('order.list');
            Route::get('delete/{id}','OrderController@destroy')->name('order.delete');
            Route::get('update/status/{status}/id/{id}','OrderController@updateStatus')->name('order.update.status');
            Route::get('show/{id}','OrderController@show')->name('order.show');
        });
    });
});