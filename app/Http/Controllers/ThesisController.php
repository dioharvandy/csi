<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Theses;
use App\Models\Lecturer;
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
            ->where([
                ['theses.student_id', $user],
                // ['theses.status', '>=', 4],
                ['theses.status', '<', 35]
                ])->paginate(10);
            // ->where(['theses.status', '>=', 4])
            // ->where('theses.status', '<', 35)
            
            $supervisors = ThesisSupervisor::select('thesis_supervisors.*', 'lecturers.name as lecturer_name')
            ->join('lecturers', 'thesis_supervisors.lecturer_id', '=', 'lecturers.id')
            ->where('thesis_supervisors.status', 1)
            ->get();

            $lecturer = DB::table('lecturers')->pluck('name', 'id');
            return view('backend.theses.index', compact('theses', 'supervisors', 't_statuses', 'lecturer', 'topic', 'student'));
    }
    

    public function store(Request $request){

        //Create Theses
        $x = Theses::create($request->all());

        //Create Lecturer
        $data = $request->all();
        $lecturer_field = $data['lecturer_id'];
        $supervisors = ThesisSupervisor::all();
        $status = [];
            foreach ($lecturer_field as $value) {
                $status[$value] = 0;
                foreach($supervisors as $supervisor){
                    if($supervisor->lecturer_id == $value){
                        $status[$value]++;
                    }
                }
                if($status[$value] >= 20){
                    $lecturer = Lecturer::findOrFail($value);
                    toastr()->warning("Pembimbing ".$lecturer->name." sudah penuh");
                    return redirect()->route('students.index');
                }
            }

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
            
            $supervisors = DB::table('thesis_supervisors')
            ->join('lecturers', 'thesis_supervisors.lecturer_id', '=', 'lecturers.id')
            ->select('thesis_supervisors.*', 'lecturers.name as lecturer_name')
            ->where('thesis_supervisors.thesis_id', $id)
            ->where('thesis_supervisors.status', 1)
            ->get();

            $lecturer = DB::table('lecturers')->pluck('name', 'id');

            if(auth()->user()->type == 2){
                return view('backend.theses.show', compact('theses', 'supervisors', 't_statuses', 'lecturer'));
            }
            elseif(auth()->user()->type == 3){
                return view('backend.supervisor.show_supervisor', compact('theses', 'supervisors', 't_statuses', 'lecturer'));
            }
    }

}
