<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ClassLecturer;
use App\Models\Classroom;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Lecturer;

class ClassController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	// $data = ClassLecturer::wh();
    	// $datas = Classroom::select('classrooms.id as idc', 'classrooms.*', 'lecturers.name as dosen', 'semesters.*', 'courses.*')
     //            ->rightjoin('class_lecturers','classrooms.id','class_lecturers.classroom_id')
    	// 		->rightjoin('lecturers','class_lecturers.lecturer_id','lecturers.id')
     //            ->leftjoin('semesters','classrooms.semester_id','semesters.id')
     //            ->leftjoin('courses','classrooms.course_id','courses.id')
    	// 		->get();
    			// dd($datas);
        $datas = Classroom::all();
        // dd($datas);

    	// $datas = Classroom::all();

        return view('kelas.index',compact('datas'));
    }

    public function tambah()
    {
    	$data = Course::all();
    	$data2 = Semester::all();
    	$data3 = Lecturer::all();
    	return view('kelas.tambah',compact('data','data2','data3'));
    }

    public function simpan(Request $request)
    {
        if($request->minimal_kuota > $request->maksimal_kuota)
        {
            return redirect('/kelas')->with('failed','Data gagal ditambah');
        }
    	$ids = Classroom::create([
    		'course_id'	=> $request->matkul,
    		'semester_id'	=> $request->semester,
    		'name'	=> $request->nama_kelas,
    		'min_students'	=> $request->minimal_kuota,
    		'max_students'	=> $request->maksimal_kuota,
    		'description'	=> $request->deskripsi
    	])->id;

    	return redirect('/kelas')->with('success','Data berhasil ditambah');
    }

    public function edit($id)
    {
    	$data = Classroom::find($id);
    	$data1 = Course::all();
    	$data2 = Semester::all();
    	return view('kelas.edit',compact('data','data1','data2'));
    }

    public function update(Request $request, $id)
    {
		Classroom::whereId($id)->update([
    		'course_id'		=> $request->matkul,
    		'semester_id'	=> $request->semester,
    		'name'			=> $request->nama_kelas,
    		'min_students'	=> $request->minimal_kuota,
    		'max_students'	=> $request->maksimal_kuota,
    		'description'	=> $request->deskripsi
    	]);

    	return redirect('/kelas')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
    	$data = Classroom::find($id);
    	// dd($data);
    	$data->delete();
    	

    	return redirect('/kelas')->with('success','Data berhasil dihapus');
    }

    public function detail($id)
    {
    	$data = Classroom::findOrFail($id);
    	return view('kelas.detail', compact('data'));

    }
}
