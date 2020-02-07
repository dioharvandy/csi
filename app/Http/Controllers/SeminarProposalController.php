<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Theses;

class SeminarProposalController extends Controller
{
    public function student(){

        $user_id = auth()->user();
        $user = Student::find($user_id)->pluck('id');
        
        $theses =  Theses::select()
        ->where('theses.student_id', $user)
        ->get();
        // ->join('thesis', 'theses.thesis_id', '=', 'thesis_topics.id')
            // ->where('')

        // dd($theses);

        return view('backend.seminar_proposal.index', compact('theses'));
    }
}
