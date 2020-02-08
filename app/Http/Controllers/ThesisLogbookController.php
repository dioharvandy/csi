<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThesisLogbook;
use App\Student;
use App\Thesis;
use App\ThesisTopic;
use DB;
use Auth;

class ThesisLogbookController extends Controller
{
    public $validation_rules = [
        'thesis_id' => 'required|title',
    ];

    public function index(){
        $id = Auth::user()->username;
        $tass = DB::table('students')
        -> join('theses', 'theses.student_id', '=', 'students.id')
        -> select('theses.title', 'students.nim', 'students.name');
        return view('backend.ta.index', compact('tass', 'id'));
    }

    public function create()
    {
        $id = Auth::user()->username;
        $bta = DB::table('students')
        -> join('theses', 'students.id', '=', 'theses.student_id')
        -> join('thesis_topics', 'theses.thesis_id', '=', 'thesis_topics.id')
        -> select('students.name', 'students.nim', 'thesis_topics.name as topic')
        -> where('students.nim', '=', '$id')
        ->first();
        return view('backend.ta.create', compact('bta', 'id'));
    }

    public function show($id)
    {
        $bta = DB::table('students')
        -> join('theses', 'students.id', '=', 'theses.student_id')
        -> join('thesis_topics', 'theses.thesis_id', '=', 'thesis_topics.id')
        -> where('students.id', '=', '$id')
        ->select('students.nim', 'students.nim', 'thesis_topics.name as topic')
        ->get();

        // $ta = DB::table('tugas_akhir')
        //         ->join('mahasiswa', 'mahasiswa.id', '=', 'tugas_akhir.mahasiswa_id')
        //         ->select('mahasiswa.nama', 'mahasiswa.nim', 'tugas_akhir.judul')
        //         ->where('tugas_akhir.id', '=', $id)
        //         ->get()[0];
        // $pembimbingTAs = TaPembimbing::all();
        // dd($pembimbingTAs);
        // dd($pembimbingTAs);
        return view('backend.ta.create', compact('bta', 'id'));
    }

    public function store(Request $request){
        $request->validate([
            'thesis_id' => 'required'
       ]);

        $ta= new ThesisLogbook();
        $ta->thesis_id = $request->input('dosen_id');
        $ta->thesis_logbook_id = $request->input('thesis_logbook_id');
        $ta->supervisor_id = $request->input('supervisor_id');
        $ta->progress = $request->input('progress');

        $ta->save();
        session()->flash('flash_success', 'Berhasil menambahkan pembimbing!');

        return view('backend.ta.index');
    }

    public function update(){
        $id = Auth::user()->username;
        $updatee = DB::table('students')
                -> join('theses', 'students.id', '=', 'theses.student_id')
                -> join('thesis_topics', 'theses.thesis_id', '=', 'thesis_topics.id')
                -> where('students.nim', '=', '$id')
                -> get();
        return view('backend.ta.create', compact('updatee'));
    }

}
