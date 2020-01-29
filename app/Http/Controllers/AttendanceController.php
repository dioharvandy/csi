<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  public function __construct()
    //  {
    //      $this->middleware(['permission:manage_lecturers']);
    //  }

    public function index(Request $request)
    {   
        $sems = $request->get('semester');
        $perPage = 10;
        $semester = DB::table('semesters')->get();
        
        if(!empty($sems)){

        $attendance = DB::table('semesters')
        ->join('classrooms','classrooms.semester_id','=','semesters.id')
        ->join('class_lecturers','class_lecturers.classroom_id','=','classrooms.id')
        ->join('lecturers','class_lecturers.lecturer_id','=','lecturers.id')
        ->join('courses','classrooms.course_id','=','courses.id')
        ->select('courses.id','courses.name AS crs_name','courses.code','courses.semester','lecturers.name AS lecname')
        ->where([
            ['semesters.id','=', $sems]
        ])
        ->paginate($perPage);
                }

        else {

        $attendance = DB::table('semesters')
        ->join('classrooms','classrooms.semester_id','=','semesters.id')
        ->join('class_lecturers','class_lecturers.classroom_id','=','classrooms.id')
        ->join('lecturers','class_lecturers.lecturer_id','=','lecturers.id')
        ->join('courses','classrooms.course_id','=','courses.id')
        ->select('courses.id','courses.name AS crs_name','courses.code','courses.semester','lecturers.name AS lecname')
        ->paginate($perPage);

     }
        return view('backend.attendance.index', compact('attendance','semester'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attendance = DB::table('attendances')
        ->join('class_lecturers','class_lecturer_id','=','class_lecturers.id')
        ->join('lecturers','class_lecturers.lecturer_id','=','lecturers.id')
        ->join('classrooms','class_lecturers.classroom_id','=','classrooms.id')
        ->join('courses','classrooms.course_id','=','courses.id')
        ->where('courses.id','=',$id)
        ->select('attendances.*','courses.name AS crs_name','courses.code','courses.semester','lecturers.name AS lecname')
        ->get();
        
        $students = DB::table('classrooms')
        ->join('course_selections','course_selections.classroom_id','=','classrooms.id')
        ->join('student_semesters','course_selections.student_semester_id','=','student_semesters.id')
        ->join('students','student_id','=','students.id')
        ->select('students.name AS std_name','students.nim')
        ->get();
        
        $limits = DB::table('attendances')
        ->join('class_lecturers','class_lecturer_id','=','class_lecturers.id')
        ->join('lecturers','class_lecturers.lecturer_id','=','lecturers.id')
        ->join('classrooms','class_lecturers.classroom_id','=','classrooms.id')
        ->join('courses','classrooms.course_id','=','courses.id')
        ->where('courses.id','=',$id)
        ->distinct()
        ->get(['attendances.id']);
        
        $attendance_students = DB::table('attendance_students')
        ->join('attendances','attendance_id','=','attendances.id')
        ->join('course_selections','attendance_students.course_selection_id','=','course_selections.id')
        ->join('classrooms','course_selections.classroom_id','=','classrooms.id')
        ->join('courses','classrooms.course_id','=','courses.id')
        ->join('student_semesters','course_selections.student_semester_id','=','student_semesters.id')
        ->join('students','student_id','=','students.id')
        ->where('courses.id','=',$id)
        ->select('students.nim','students.name','attendance_students.status','attendances.date')
        ->get();
 
        // dd(is_array());

        $ikan = null;
        $ayam = [];
        $kerbau = [];
        $kolom = [];
        foreach ($attendance_students as  $a) {
            $ikan = null;
            if (!in_array($a->date,$kolom)) {
                array_push($kolom, $a->date);
            }
            if (!in_array($a->nim,$kerbau)) {
                array_push($kerbau, $a->nim);
                foreach ($attendance_students as $b) {
                    if ($a->nim == $b->nim) {   
                        if ($ikan == null) {
                            $ikan['nim'] = $b->nim;
                            $ikan['name'] = $b->name;
                            $ikan['desc'] = [['date' => $b->date, 'status' => $b->status]];   
                        }else {
                            array_push($ikan['desc'], ['date' => $b->date, 'status' => $b->status]);
                        }
                    }
                }   
                array_push($ayam,$ikan);   
            } 
        }

        $date_pluck = DB::table('attendances')->pluck('id','date');
        $student_pluck = DB::table('attendance_students')->where('attendance_id', $date_pluck)->get();
        // $x = 
        // dd($date_pluck);
        // dd($student_pluck);
        
        return view('backend.attendance.show', compact('attendance','students','attendance_students', 'limits', 'student_pluck', 'date_pluck','ayam','kolom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
