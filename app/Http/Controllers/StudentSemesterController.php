<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudentSemesterController extends Controller
{
    public function index()
    {
        $theses = DB::table('theses')
        ->join('thesis_topics', 'theses.thesis_id', '=', 'thesis_topics.id')
        ->select('theses.*', 'thesis_topics.name as topics_name')->get();
        // ->join('thesis_supervisors', 'thesis_supervisors.thesis_id', '=', 'theses.id')
        
        $supervisor = DB::table('thesis_supervisors')
        ->join('lecturers', 'thesis_supervisors.lecturer_id', '=', 'lecturers.id')
        ->select('thesis_supervisors.*', 'lecturers.name as lecturer_name')->get();
        // dd($supervisor);
        return view('backend.students.index', compact('theses', 'supervisor'));
    }
}
