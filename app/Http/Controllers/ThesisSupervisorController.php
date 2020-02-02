<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Theses;
use App\Models\ThesisSupervisor;
use App\Models\Lecturer;
use DB;


class ThesisSupervisorController extends Controller
{
    // INDEX
    function index(){
        $user_id = auth()->user();
        $user = Lecturer::find($user_id)->pluck('id');

        $supervisors = ThesisSupervisor::select('thesis_supervisors.*', 'students.name as student_name', 'students.nim as student_nim', 'theses.title as title', 'theses.status as thesis_status', 'theses.id as thesis_id')
        ->join('theses', 'theses.id', '=', 'thesis_supervisors.thesis_id')
        ->join('students', 'students.id', '=', 'theses.student_id')
        ->where('thesis_supervisors.status',  0)
        ->where('lecturer_id',  $user)
        ->paginate(10);

        $accepts = ThesisSupervisor::select('thesis_supervisors.*', 'students.name as student_name', 'students.nim as student_nim', 'theses.title as title', 'theses.status as thesis_status', 'theses.id as thesis_id')
        ->join('theses', 'theses.id', '=', 'thesis_supervisors.thesis_id')
        ->join('students', 'students.id', '=', 'theses.student_id')
        ->where('thesis_supervisors.status',  1)
        ->where('lecturer_id',  $user)
        ->paginate(10);

        // dd($accepts->count());
        return view('backend.supervisor.index', compact('supervisors', 'accepts'));
    } // INDEXEND

    // ACCEPT-REJECT
    function accepted($id){
        $user_id = auth()->user();
        $user = Lecturer::find($user_id)->pluck('id');

        $theses = Theses::find($id)->update([
            "status" => 5,
        ]);

        $supervisor = ThesisSupervisor::where([
            ['thesis_id', $id],
            ['lecturer_id', $user],
        ])->update([
            "status" => 1,
        ]);

        toastr()->success('Tugas Akhir sudah diterima');
        return redirect()->route('admin.supervisor.index');
    }

    function rejected($id){
        $user_id = auth()->user();
        $user = Lecturer::find($user_id)->pluck('id');

        $theses = Theses::find($id)->update([
            "status" => 35,
        ]);

        $supervisor = ThesisSupervisor::where([
            ['thesis_id', '=', $id],
            ['lecturer_id', '=', $user],
        ])->update(["status" => 2]);
        
        toastr()->error('Tugas Akhir sudah ditolak');
        return redirect()->route('admin.supervisor.index');
    }
//ACCEPT-REJECT END

    // function create(Request $request){
    //     $data = $request->all();
    //     $supervisor = ThesisSupervisor::create($data);
    //     toastr()->success('Pembimbing sudah diajukan');
    //     return redirect()->route('students.index');
        
    // }
}
