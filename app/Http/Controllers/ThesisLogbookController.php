<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThesisLogbook;
use DB;

class ThesisLogbookController extends Controller
{
    public function index($id)
    {
        $logbook = ThesisLogbook::select('thesis_logbooks.*', 
        'lecturers.name as lecturer_name', 'theses.title as thesis_title')
        ->join('theses', 'thesis_logbooks.thesis_id', '=', 'theses.id')
        ->join('thesis_supervisors', 'thesis_supervisors.id', '=', 'thesis_logbooks.supervisor_id')
        ->join('lecturers', 'thesis_supervisors.lecturer_id', '=', 'lecturers.id')
        ->where('thesis_logbooks.thesis_id' , $id)->get();
        // $logbook = ThesisLogbook::find($id);
        // $logbook = DB::table('thesis_logbooks')->where('thesis_logbooks.thesis_id', '=', $id)->get();
        
        // dd($logbook);
        return view('backend.ta_logbooks.index', compact('logbook'));

        if(auth()->user()->type == 2){
            return view('backend.ta_logbooks.index', compact('logbook'));
        }
        elseif(auth()->user()->type == 3){
            return view('backend.ta_logbooks.index', compact('logbook'));
        }
    }
}
