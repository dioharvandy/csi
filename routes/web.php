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

Auth::routes();

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/lecturer', 'backend\LecturerController@index');
    Route::get('/attendance', 'AttendanceController@index');
    Route::get('/attendance/{id}/{jenis}', 'AttendanceController@show')->name('kehadiran');
    Route::patch('/attendance/student', 'AttendanceController@store');
    Route::get('/attendance/student/{id}/detail', 'AttendanceController@showStudent');
    Route::get('/attendance/edit/{id}/detail', 'AttendanceController@edit')->name('detailabsen');
    Route::patch('/attendance/edit/{id}', 'AttendanceController@update')->name('editabsen');

    Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('home', 'HomeController@index')->name('home');
    require(__DIR__ . '/backend/master.php');
});
