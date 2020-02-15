<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ClassLecturer;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Lecturer;

class ClassLecturerController extends Controller
{
    public function index()
    {
        // $datas = ClassLecturer::select(DB::raw('class_lecturers.*,lecturers.name as dosen, semesters.*,classrooms.*,courses.*'))
        //         ->leftjoin('classrooms','class_lecturers.classroom_id','classrooms.id')
        //         ->leftjoin('lecturers','class_lecturers.lecturer_id','lecturers.id')
        //         ->leftjoin('semesters','classrooms.semester_id','semesters.id')
        //         ->leftjoin('courses','classrooms.course_id','courses.id')
        //         // ->where('semesters.year','=','year(CURRENT_TIMESTAMP)')
        //         ->get();

        $datas = Lecturer::all();
        // dd($datas);
        return view('kelas_dosen.index',compact('datas'));
    }
    public function tambah()
    {
    	$data1 = Classroom::all();
    	$data2 = Lecturer::all();
    	return view('kelas_dosen.tambah',compact('data1','data2'));
    }

    public function simpan(Request $request)
    {
    	ClassLecturer::create([
    		'lecturer_id'	=> $request->nama_dosen,
    		'classroom_id'	=> $request->nama_kelas
    	]);

    	return redirect('/kelasdosen')->with('success','Data berhasil ditambahkan');
    }

    public function detail($id)
    {
        return view('kelas_dosen.detail');
    }

}
