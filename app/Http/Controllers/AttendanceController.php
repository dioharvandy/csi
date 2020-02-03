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
     public function __construct()
     {
         $this->middleware(['permission:manage_lecturers']);
     }

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
            $date = $request->date;
            $newdate = date("Y-m-d", strtotime($date));

            $students = DB::table('classrooms')
            ->join('course_selections','course_selections.classroom_id','=','classrooms.id')
            ->join('student_semesters','course_selections.student_semester_id','=','student_semesters.id')
            ->join('students','student_id','=','students.id')
            ->select('students.name AS std_name','students.nim','course_selections.id AS crs_id')
            ->get();

            DB::table('attendances')->insertGetId(
            array('class_lecturer_id' => $request->class_lecturer_id,
                  'meeting_no'=> $request->meeting_no,
                  'date' => $newdate,
                  'start_at'=> $request->start_at,
                  'end_at'=> $request->end_at,
                  'room_id'=> $request->room_id,
                  'photo'=> $request->photo,
                  'status'=> 1
            )
        );

        $attendance = DB::table('attendances')
        ->orderby('id','desc')
        ->limit(1)
        ->get();

        foreach ($students as $student) {
            DB::table('attendance_students')->insertGetId(
                array('attendance_id' => $attendance[0]->id,
                      'course_selection_id'=> $student->crs_id,
                      'check_in_time'=> $request->start_at,
                      'check_out_time'=> $request->end_at,
                      'status'=> 1,
                )
            );
        }

        $attendance_students = DB::table('attendance_students')
        ->join('attendances','attendance_id','=','attendances.id')
        ->join('course_selections','attendance_students.course_selection_id','=','course_selections.id')
        ->join('classrooms','course_selections.classroom_id','=','classrooms.id')
        ->join('courses','classrooms.course_id','=','courses.id')
        ->join('student_semesters','course_selections.student_semester_id','=','student_semesters.id')
        ->join('students','student_id','=','students.id')
        ->select('students.nim','students.name','attendance_students.status','attendances.date')
        ->where([
            ['attendances.id','=', $attendance[0]->id]
        ])
        ->get();
        
        
        return redirect('attendance/student/'.$attendance_students[0]->id);
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
        ->select('attendances.*','courses.id AS crs_id','courses.name AS crs_name','courses.code',
                 'courses.semester','lecturers.name AS lecname','class_lecturers.id AS clectr_id')
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
        $attendance_students = DB::table('attendance_students')
        ->join('attendances','attendance_id','=','attendances.id')
        ->join('course_selections','attendance_students.course_selection_id','=','course_selections.id')
        ->join('classrooms','course_selections.classroom_id','=','classrooms.id')
        ->join('courses','classrooms.course_id','=','courses.id')
        ->join('student_semesters','course_selections.student_semester_id','=','student_semesters.id')
        ->join('students','student_id','=','students.id')
        ->select('attendance_students.id','students.nim','students.name','attendance_students.status','attendances.date','courses.code',
                 'courses.name AS crs_name','courses.credit','attendances.start_at','attendances.end_at','courses.id AS crs_id')
        ->where([
            ['attendances.id','=', $id]
        ])
        ->get();

        return view('backend.attendance.edit', compact('attendance_students'));
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
        DB::table('attendance_students')
            ->where('id', '=', $request->id)
            ->update(['status' => $request->status]);

            return redirect('/attendance/edit/'.$id)->with('flash_message', 'Data updated!');
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

    public function showStudent($id){

        $attendance_students = DB::table('attendance_students')
        ->join('attendances','attendance_id','=','attendances.id')
        ->join('course_selections','attendance_students.course_selection_id','=','course_selections.id')
        ->join('classrooms','course_selections.classroom_id','=','classrooms.id')
        ->join('courses','classrooms.course_id','=','courses.id')
        ->join('student_semesters','course_selections.student_semester_id','=','student_semesters.id')
        ->join('students','student_id','=','students.id')
        ->select('students.nim','students.name','attendance_students.status','attendances.date','courses.code',
                 'courses.name AS crs_name','courses.credit','attendances.start_at','attendances.end_at')
        ->where([
            ['attendances.date','=', $id]
        ])
        ->get();

        return view('backend.attendance.student', compact('attendance_students'));
    }
}
