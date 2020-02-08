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

Route::get('/profile/show', 'HomeController@showProfile')->name('profile.show');
Route::get('/profile/edit', 'HomeController@editProfile')->name('profile.edit');
Route::patch('/profile/edit', 'HomeController@updateProfile')->name('profile.update');

Route::get('/admin/ta', 'ThesisLogbookController@index')->name('admin.ta.index');
Route::post('/admin/ta', 'ThesisLogbookController@store')->name('admin.ta.store'); //routing simpan data dosen baru
Route::get('/user/ta/create', 'ThesisLogbookController@create')->name('user.ta.create');
Route::delete('/admin/ta/{ta}', 'ThesisLogbookController@destroy')->name('admin.ta.destroy'); //routing hapus data dosen baru
Route::patch('/admin/ta/update', 'ThesisLogbookController@update')->name('admin.ta.update'); //routing simpan perubahan data dosen
Route::get('/admin/ta/{ta}', 'ThesisLogbookController@show')->name('admin.ta.show'); //routing tampilkan detail dosen
Route::get('/admin/ta/{ta}/edit', 'ThesisLogbookController@edit')->name('admin.ta.edit');
// Route::get('/admin/ta/create/{id}', 'ThesisLogbookController@create')->name('admin.ta._form');  //routing tampilkan form edit dosen


Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('home', 'HomeController@index')->name('home');

    require(__DIR__ . '/backend/master.php');
});
