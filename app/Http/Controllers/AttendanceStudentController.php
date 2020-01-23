<?php

namespace App\Http\Controllers;
use App\attendance_students;
use DB;
use Illuminate\Http\Request;

class AttendanceStudentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {   
         $sems = $request->get('semester');
         $matkul = $request->get('matkul');
         $perPage = 10;
         $semester = DB::table('semesters')->get();
         
         if(!empty($sems)&&!empty($matkul)){
 
         $attendance = DB::table('attendance_students')
         ->join('attendances','attendance_id','=','attendances.id')
         ->join('class_lecturers','class_lecturer_id','=','class_lecturers.id')
         ->join('lecturers','class_lecturers.lecturer_id','=','lecturers.id')
         ->join('classrooms','class_lecturers.classroom_id','=','classrooms.id')
         ->join('semesters','classrooms.semester_id','=','semesters.id')
         ->join('courses','classrooms.course_id','=','courses.id')
         ->select('attendance_students.*','courses.name AS crs_name','courses.code','courses.semester','lecturers.name AS lecname')
         ->where([
             ['semesters.id', $sems],
             ['courses.name', 'LIKE', "%$matkul%"],
         ])
         ->paginate($perPage);
 
                 }
 
         else {
 
         $attendance = DB::table('attendance_students')
         ->join('attendances','attendance_id','=','attendances.id')
         ->join('class_lecturers','class_lecturer_id','=','class_lecturers.id')
         ->join('lecturers','class_lecturers.lecturer_id','=','lecturers.id')
         ->join('classrooms','class_lecturers.classroom_id','=','classrooms.id')
         ->join('courses','classrooms.course_id','=','courses.id')
         ->select('attendance_students.*','courses.name AS crs_name','courses.code','courses.semester','lecturers.name AS lecname')
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
         $attendance = DB::table('attendance_students')
         ->join('attendances','attendance_id','=','attendances.id')
         ->join('class_lecturers','class_lecturer_id','=','class_lecturers.id')
         ->join('lecturers','class_lecturers.lecturer_id','=','lecturers.id')
         ->join('classrooms','class_lecturers.classroom_id','=','classrooms.id')
         ->join('courses','classrooms.course_id','=','courses.id')
         ->where('attendance_students.id','=',$id)
         ->select('attendance_students.*','courses.name AS crs_name','courses.code','courses.semester','lecturers.name AS lecname')
         ->get();

         $students = DB::table('attendance_students')
         ->join('course_selections','course_selection_id','=','course_selections.id')
         ->join('student_semesters','student_semester_id','=','student_semesters.id')
         ->join('students','student_id','=','students.id')
         ->where('attendance_students.id','=',$id)
         ->select('attendance_students.*','students.name AS std_name','students.nim')
         ->get();

         return view('backend.attendance.show', compact('attendance','students'));
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
