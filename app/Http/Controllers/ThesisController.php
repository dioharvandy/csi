<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Theses;
use App\Models\ThesisSupervisor;
use DB;

class ThesisController extends Controller
{
    public function index(){
        $t_statuses = Theses::$theses_statuses;
        
        $user_id = auth()->user();
        $user = Student::find($user_id)->pluck('id');
        // dd($user);
            
        $student = Student::find($user_id)->first();
        $topic = DB::table('thesis_topics')->pluck('name', 'id');
            
            $theses =  Theses::select('theses.*', 'thesis_topics.name as topics_name')
            ->join('thesis_topics', 'theses.thesis_id', '=', 'thesis_topics.id')
            ->where('theses.student_id', $user)
            ->paginate(10);

            
            $supervisors = ThesisSupervisor::select('thesis_supervisors.*', 'lecturers.name as lecturer_name')
            ->join('lecturers', 'thesis_supervisors.lecturer_id', '=', 'lecturers.id')
            ->where('thesis_supervisors.status', 1)
            ->get();

            // dd($supervisors->id);
    
            
            $lecturer = DB::table('lecturers')->pluck('name', 'id');
            // dd($theses);
            return view('backend.theses.index', compact('theses', 'supervisors', 't_statuses', 'lecturer', 'topic', 'student'));

    }

    public function store(Request $request){

        //Create Theses
        $x = Theses::create($request->all());

        //Create Lecturer
        $data = $request->all();
        $lecturer_field = $data['lecturer_id'];
        // dd($lecturer_field);
            foreach ($lecturer_field as $key => $value) {
                if (isset($value)) {
                    if($key == 0){
                        ThesisSupervisor::create(['thesis_id' => $x->id, 'lecturer_id' => $value, 'position' => 1]);
                    }
                    else {
                        ThesisSupervisor::create(['thesis_id' => $x->id, 'lecturer_id' => $value, 'position' => 2]);
                    }
                }
            }
        toastr()->success('Pembimbing sudah diajukan');
        return redirect()->route('students.index');
    }

    public function show($id){

            $t_statuses = Theses::$theses_statuses;

            $theses =  Theses::select('theses.*', 'thesis_topics.name as topics_name')
            ->join('thesis_topics', 'theses.thesis_id', '=', 'thesis_topics.id')
            ->where('theses.id',$id)
            ->get();

            // dd($t_statuses);
            // dd($theses[0]->id);

            // $theses =  Theses::find($id)
            // ->first();
            
            $supervisor = DB::table('thesis_supervisors')
            ->join('lecturers', 'thesis_supervisors.lecturer_id', '=', 'lecturers.id')
            ->select('thesis_supervisors.*', 'lecturers.name as lecturer_name')
            ->where('thesis_supervisors.thesis_id', $id);
            // ->get();
            $x = $supervisor->where('thesis_supervisors.status', 0)->pluck('lecturer_name', 'id');
            $y = $supervisor->where('thesis_supervisors.status', 1)->pluck('lecturer_name', 'id');

            $lecturer = DB::table('lecturers')->pluck('name', 'id');

            return view('backend.theses.show', compact('theses', 'supervisor', 't_statuses', 'lecturer'));
    }

}
