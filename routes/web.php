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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

// ユーザー側

Route::get('/login','User\Auth\LoginController@showLoginForm')->name('user.login');
Route::post('/login','User\Auth\LoginController@login');

Route::get('/logout','User\Auth\LoginController@logout')->name('user.logout');

Route::get('/register','User\Auth\RegisterController@showRegistrationForm')->name('user.register');
Route::post('/register','User\Auth\RegisterController@register');

// Route::get('/password/reset','User\Auth\LoginController@passwordReset')->name('user.password_reset'); // これから作る

Route::middleware('auth:user')->group(function(){
    Route::get('/dashboard','User\DashBoardController@index')->name('user.dashboard');

    Route::get('/easy_registration','User\EasyRegistrationController@index')->name('user.easy_registration');
    Route::post('/easy_registration','User\EasyRegistrationController@registration');
    Route::put('/easy_registration','User\EasyRegistrationController@put');
    Route::delete('/easy_registration','User\EasyRegistrationController@delete');

    Route::get('/shift_create','User\ShiftCreateController@index')->name('user.shift_create');
    Route::post('/shift_create','User\ShiftCreateController@create');

    Route::get('/shift_pettern','User\ShiftPetternController@index')->name('user.registration_pattern');
    Route::post('/shift_pettern','User\ShiftPetternController@branchPost');

    Route::get('/shift_list','User\ShiftListController@index')->name('user.shift_list');        
    Route::put('/shift_list','User\ShiftListController@put');
    Route::delete('/shift_list','User\ShiftListController@delete');
    
    Route::get('/monthly_attendance_record/{date}/{process}','User\MonthlyAttendanceRecordController@index')
    ->where('process','(basis|prev|next)')->name('user.monthly_attandance_record');

    Route::get('test/{date}/{proccess}','User\MonthlyAttendanceRecordController@changeDate')->name('user.date_change');

    Route::get('/acount_edit','User\AcountEditController@index')->name('user.acount_edit');
    Route::put('/acount_edit','User\AcountEditController@edit');

    Route::get('/setting','User\SettingController@index')->name('user.setting');
    Route::put('/setting','User\SettingController@edit');
});

// 管理側
Route::prefix('admin56765467654sgegmp68786')->group(function(){
    Route::get('/login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Admin\Auth\LoginController@login');

    Route::get('/logout','Admin\Auth\LoginController@logout')->name('admin.logout');

    // Route::get('/register','Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
    // Route::post('register','Admin\Auth\RegisterController@register');

    Route::middleware('auth:admin')->group(function(){
        Route::get('/dashboard','Admin\DashBoardController@index')->name('admin.dashboard');

        Route::get('/staff_info','Admin\UserInformationController@index')->name('admin.staff_info');

        Route::get('/staff_info_details/{user_id}','Admin\UserInformationDetailsController@index')->name('admin.staff_info_details');
        Route::put('/staff_info_details/{user_id}','Admin\UserInformationDetailsController@edit');

        Route::get('/super_visor','Admin\SuperVisorController@index')->name('admin.super_visor');
        Route::post('/super_visor','Admin\SuperVisorController@register');
        Route::put('/super_visor','Admin\SuperVisorController@edit');


        Route::get('/super_visor/details/{id}','Admin\SuperVisorController@details')->name('admin.super_visor_details');

        Route::get('/attendance_status/{date}','Admin\AttendanceStatusController@index')->name('admin.attendance_status');

        Route::get('/line_Notification_pegging','Admin\LineNotificationPeggingController@index')->name('admin.line_notification_pegging');
        
        Route::get('/line_Notification_pegging/{request_id}','Admin\LineNotificationPeggingController@details')->name('admin.line_notification_pegging_details');
        Route::post('/line_Notification_pegging/{request_id}','Admin\LineNotificationPeggingController@register');
        
        Route::get('/notification_settings','Admin\NotificationSettingsController@index')->name('admin.notification_settings');
        Route::post('/notification_settings','Admin\NotificationSettingsController@post');
    });
});