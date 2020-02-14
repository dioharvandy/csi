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

Route::get('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/postlogin', 'AuthController@postlogin')->name('postlogin');

 Route::middleware('auth')->group( function() {
    Route::get('/home', 'DashboardController@index')->name('home');

    //Supervisor
    Route::get('/supervisor', 'ThesisSupervisorController@index')->name('admin.supervisor.index');
    Route::post('/supervisor/accepted/{id}', 'ThesisSupervisorController@accepted')->name('admin.supervisor.accepted');
    Route::post('/supervisor/rejected/{id}', 'ThesisSupervisorController@rejected')->name('admin.supervisor.rejected');
    Route::get('/supervisor/thesis/detail/{id}', 'ThesisController@show')->name('admin.supervisor.theses.show');
      //Detail Thesis dan Sempro
    Route::get('/mahasiswa/seminar_proposal/{id}', 'SeminarProposalController@supervisor')->name('admin.supervisor.prosem.index');

    //Tugas Akhir
    Route::get('/mahasiswa', 'ThesisController@index')->name('students.index');
    Route::post('/mahasiswa/store/', 'ThesisController@store')->name('students.theses.store');
    Route::get('/mahasiswa/detail/{id}', 'ThesisController@show')->name('students.theses.show');
    Route::post('/mahasiswa/supervisor/', 'ThesisSupervisorController@create')->name('student.supervisor.create');
    
    //Logbook ==Mahasiswa==
    Route::get('/mahasiswa/logbook/{id}', 'ThesisLogbookController@index')->name('students.ta_logbook.index');
    //Logbook ==Supervisor==
    Route::get('/supervisor/logbook/{id}', 'ThesisLogbookController@index')->name('admin.supervisor.ta_logbook.index');

    //Seminar Proposal ==Student==
    Route::get('/mahasiswa/seminar_proposal/{id}', 'SeminarProposalController@student')->name('students.prosem.index');
    Route::post('/mahasiswa/seminar_proposal/store/', 'SeminarProposalController@store_student')->name('students.prosem.store');
    Route::get('/mahasiswa/seminar_proposal/detail/{id}', 'SeminarProposalController@show_student')->name('students.prosem.show');
    Route::get('/mahasiswa/seminar_proposal/download/{id}', 'SeminarProposalController@download')->name('students.prosem.download');

    //Seminar Proposal ==Supervisor==
    Route::get('/supervisor/seminar_proposal/{id}', 'SeminarProposalController@supervisor')->name('admin.supervisor.prosem.index');
    Route::get('/supervisor/seminar_proposal/detail/{id}', 'SeminarProposalController@show_supervisor')->name('admin.supervisor.prosem.show');
    Route::post('/supervisor/seminar_proposal/accepted/{id}', 'SeminarProposalController@accepted')->name('admin.supervisor.prosem.accepted');
    // Route::post('/supervisor/seminar_proposal/rejected/{id}', 'ThesisSupervisorController@rejected')->name('admin.supervisor.prosem.rejected');
 });


// Route::group(['namespace' => 'backend', 'prefix' => 'admin', 'as' => 'admin.'], function(){
    
//     Route::get('home', 'HomeController@index')->name('home');
//     require(__DIR__ . '/backend/master.php');
// });

// Route::get('/admin/mahasiswa', 'StudentSemesterController@index')->name('admin.mahasiswa.index');
