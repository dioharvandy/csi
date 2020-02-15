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
Route::get('kelas','ClassController@index')->name('kelas.index');
Route::get('kelas/tambah','ClassController@tambah')->name('kelas.tambah');
Route::post('kelas/simpan','ClassController@simpan')->name('kelas.simpan');
Route::get('kelas/edit/{id}','ClassController@edit')->name('kelas.edit');
Route::post('kelas/update/{id}','ClassController@update')->name('kelas.update');
Route::get('kelas/delete/{id}','ClassController@delete')->name('kelas.delete');
Route::get('kelas/detail/{id}','ClassController@detail')->name('kelas.detail');
Route::get('kelasdosen','ClassLecturerController@index')->name('kelaslecturer.index');
Route::get('kelasdosen/tambahdosenkelas','ClassLecturerController@tambah')->name('kelaslecturer.tambah');
Route::post('kelasdosen/simpandosenkelas','ClassLecturerController@simpan')->name('kelas.simpandosenkelas');
Route::get('kelasdosen/detail/{id}','ClassLecturer@detail')->name('kelaslecturer.detail');


Route::get('/profile/show', 'HomeController@showProfile')->name('profile.show');
Route::get('/profile/edit', 'HomeController@editProfile')->name('profile.edit');
Route::patch('/profile/edit', 'HomeController@updateProfile')->name('profile.update');

Route::get('logbook', 'ThesisLogbookController@logbookIndex')->name('logbook.index');
Route::post('logbook', 'ThesisLogbookController@logbookCreate')->name('logbook.create');
Route::patch('logbook', 'ThesisLogbookController@logbookUpdate')->name('logbook.update');

Route::get('/admin/ta', 'ThesisLogbookController@index')->name('admin.ta.index');
Route::post('/admin/ta', 'ThesisLogbookController@store')->name('admin.ta.store'); //routing simpan data dosen baru
Route::get('/user/ta/create', 'ThesisLogbookController@create')->name('user.ta.create');
Route::delete('/admin/ta/{ta}', 'ThesisLogbookController@destroy')->name('admin.ta.destroy'); //routing hapus data dosen baru
Route::patch('/admin/ta/update', 'ThesisLogbookController@update')->name('admin.ta.update'); //routing simpan perubahan data dosen
Route::get('/admin/ta/{ta}', 'ThesisLogbookController@show')->name('admin.ta.show'); //routing tampilkan detail dosen
Route::get('/admin/ta/{ta}/edit', 'ThesisLogbookController@edit')->name('admin.ta.edit');
// Route::get('/admin/ta/create/{id}', 'ThesisLogbookController@create')->name('admin.ta._form');  //routing tampilkan form edit dosen

Route::middleware(['auth'])->group( function(){
//    Route::post('admin/attendace/search', 'AttendanceSearchController@index')->name('admin.searchAttendane.show');
//    Route::get('admin/attendance/search', 'AttendanceController@index')->name('admin.searchAttendance.show');
    Route::get('admin/attendance/', 'AttendanceController@index')->name('admin.attendance.index');
//    Route::get('admin/attendance/create', 'AttendanceController@create')->name('admin.attendance.create');
//    Route::get('admin/attendance/show/{attendance}', 'AttendanceController@show')->name('admin.attendance.show');
    Route::get('admin/attendance/{id}/{jenis}', 'AttendanceController@show')->name('kehadiran');
    Route::patch('admin/attendance/student', 'AttendanceController@store');
    Route::get('admin/attendance/student/{id}/detail', 'AttendanceController@showStudent')->name('add_attendance');
    Route::get('admin/attendance/edit/{id}/detail', 'AttendanceController@edit')->name('detailabsen');
    Route::patch('admin/attendance/edit/{id}', 'AttendanceController@update')->name('editabsen');
});
/** Routing Pengelolaan Semhas */
Route::get('/thesis_seminar', 'ThesisSeminarController@index')->name('admin.semhas.index');  //routing lihat daftar semhas
Route::post('/thesis_seminar', 'ThesisSeminarController@store')->name('admin.semhas.store'); //routing simpan data semhas
Route::get('/thesis_seminar/create', 'ThesisSeminarController@create')->name('admin.semhas.create'); //routing tampilkan form data semhas
Route::delete('/thesis_seminar/{id}', 'ThesisSeminarController@destroy')->name('admin.semhas.destroy'); //routing hapus data semhas
Route::patch('/thesis_seminar/{thesisseminars}', 'ThesisSeminarController@update')->name('admin.semhas.update'); //routing simpan perubahan data semhas
Route::get('/thesis_seminar/{id}', 'ThesisSeminarController@show')->name('admin.semhas.show'); //routing tampilkan detail semhas
Route::get('/thesis_seminar/{thesisseminars}/edit', 'ThesisSeminarController@edit')->name('admin.semhas.edit');  //routing tampilkan form edit semhas

/** Routing Pengelolaan Peserta Semhas */
Route::get('/thesissem_audience/{id}', 'ThesisSemAudienceController@index')->name('admin.pesertasemhas.index');  //routing lihat daftar peserta semhas
Route::post('/admin/pesertasemhas', 'ThesisSemAudienceController@store')->name('admin.pesertasemhas.store'); //routing simpan data peserta semhas
Route::delete('/admin/pesertasemhas/{id}', 'ThesisSemAudienceController@destroy')->name('admin.pesertasemhas.destroy'); //routing hapus data peserta semhas
Route::get('/admin/pesertasemhas/{id}', 'ThesisSemAudienceController@show')->name('admin.pesertasemhas.show'); //routing tampilkan detail semhas


Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.'], function(){
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


 Route::group(['namespace' => 'backend', 'prefix' => 'admin', 'as' => 'admin.'], function(){

     Route::get('home', 'HomeController@index')->name('home');
//     require(__DIR__ . '/backend/master.php');
// });

    require(__DIR__ . '/backend/master.php');
    require(__DIR__ . '/backend/thesis.php');
});


Route::get('sidang', 'ThesisTrialController@index')->name('sidang.index');
Route::get('sidang/add', 'ThesisTrialController@create')->name('sidang.create');
Route::post('sidang', 'ThesisTrialController@store')->name('sidang.store');
Route::get('sidang/show', 'ThesisTrialController@show')->name('sidang.detail');
Route::get('sidang/{id}/edit', 'ThesisTrialController@edit')->name('sidang.edit');
Route::patch('sidang', 'ThesisTrialController@update')->name('sidang.update');
Route::delete('sidang/{id}', 'ThesisTrialController@delete')->name('sidang.delete');

Route::get('sidang/nilai/{id}', 'ThesisTrialController@nilai')->name('sidang.nilai');
// Route::post('sidang/nilai', 'ThesisTrialController@setNilai')->name('sidang.setnilai');

