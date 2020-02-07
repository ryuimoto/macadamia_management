<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// ユーザー側
Route::prefix('user4645775yugregergerg456tyrr7543')->group(function(){
    Route::get('login','User\Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('login','User\Auth\LoginController@login');

    Route::get('logout','User\Auth\LoginController@logout');
    Route::post('logout','User\Auth\LoginController@logout')->name('user.logout');

    Route::get('register','User\Auth\RegisterController@showRegistrationForm')->name('user.register');
    Route::post('register','User\Auth\RegisterController@register');

    Route::middleware('auth:user')->group(function(){
        Route::get('/dashboard','User\DashBoardController@index')->name('user.dashboard');

        Route::get('/shift_list','User\ShiftListController@index')->name('user.shift_list');

        Route::get('/easy_registration','User\EasyRegistrationController@index')->name('user.easy_registration');
        Route::post('/easy_registration','User\EasyRegistrationController@registration');
        Route::put('/easy_registration','User\EasyRegistrationController@put');
        Route::delete('/easy_registration','User\EasyRegistrationController@delete');

        Route::get('/shift_create','User\ShiftCreateController@index')->name('user.shift_create');
        Route::post('/shift_create','User\ShiftCreateController@create');

        Route::get('/shift_pettern','User\ShiftPetternController@index')->name('user.registration_pattern');
        Route::post('/shift_pettern','User\ShiftPetternController@branchPost');
        Route::put('/shift_pettern','User\ShiftPetternController@put');
        Route::delete('/shift_pettern','User\ShiftPetternController@delete');
        
        Route::get('/monthly_attendance_record','User\MonthlyAttendanceRecordController@index')->name('user.monthly_attandance_record');
        
        Route::get('/acount_edit','User\AcountEditController@index')->name('user.acount_edit');
        Route::put('/acount_edit','User\AcountEditController@edit');

        Route::get('/setting','User\SettingController@index')->name('user.setting');

    });
});

// 管理側
Route::prefix('admin56765467654sgegmp68786')->group(function(){
    Route::get('login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    // Route::post('login','Admin\Auth\LoginController@login');

    // Route::get('logout','Admin\Auth\LoginController@logout')->name('admin.logout');

    Route::get('register','Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
    // Route::post('register','Admin\Auth\RegisterController@register');
  
});