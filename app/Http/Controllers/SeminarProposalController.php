<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Theses;
use App\Models\ThesisProposal;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;

class SeminarProposalController extends Controller
{
    public function student($id){
        $t_statuses =  ThesisProposal::$proposalStatuses;

        $theses =  ThesisProposal::select('thesis_proposals.*', 'thesis_proposals.status as status', 'thesis_proposals.id as id', 'theses.title')
        ->join('theses', 'theses.id', '=', 'thesis_proposals.thesis_id')
        ->where('thesis_proposals.thesis_id', $id)
        ->paginate(10);
        $building = Room::pluck('name', 'id');

        return view('backend.seminar_proposal.index', compact('theses', 'building', 'id', 't_statuses'));
    }

    public function store_student(Request $request){

        // dd($request->thesis_id);
        Storage::putFile('sempro', $request->file('file'));
        
        //Path
        $file = $request->file('file');
        $fileName = time();
        $fileExtension = $file->getClientOriginalExtension();
        $newName = $fileName . '.' . $fileExtension; 
        $path = $request->file('file')->storeAs('sempro', $newName);

        //Store DB
        $date = date('Y-m-d H:i:s', strtotime($request->datetime));
        $proposal = new ThesisProposal;
            $proposal ->room_id = $request->room_id;
            $proposal ->thesis_id = $request->thesis_id;
            $proposal ->datetime = $date;
            $proposal ->file_path = $path;
        $proposal->save();

        return redirect()->back();
    }

    public function show_student($id){
        $t_statuses =  ThesisProposal::$proposalStatuses;

        $theses =  ThesisProposal::select('thesis_proposals.*', 'thesis_proposals.status as status', 'thesis_proposals.id as id', 'theses.title')
        ->join('theses', 'theses.id', '=', 'thesis_proposals.thesis_id')
        ->where('thesis_proposals.id', $id)
        ->get();

        return view('backend.seminar_proposal.show', compact('theses', 't_statuses'));
    }


    public function supervisor($id){
        $t_statuses =  ThesisProposal::$proposalStatuses;

        $theses =  ThesisProposal::select('thesis_proposals.*', 'thesis_proposals.status as status', 'thesis_proposals.id as id', 'theses.title')
        ->join('theses', 'theses.id', '=', 'thesis_proposals.thesis_id')
        ->where('thesis_proposals.thesis_id', $id)
        ->paginate(10);

        $inputs =  ThesisProposal::select('thesis_proposals.*', 'thesis_proposals.status as status', 'thesis_proposals.id as id', 'theses.title')
        ->join('theses', 'theses.id', '=', 'thesis_proposals.thesis_id')
        ->where('thesis_proposals.thesis_id', $id)
        ->get();

        // dd($inputs);

        $building = Room::pluck('name', 'id');

        return view('backend.seminar_proposal.supervisor.index', compact('theses', 'building', 'id', 't_statuses', 'inputs','post'));
    }


    public function show_supervisor($id){
        $t_statuses =  ThesisProposal::$proposalStatuses;

        $theses =  ThesisProposal::select('thesis_proposals.*', 'thesis_proposals.status as status', 'thesis_proposals.id as id', 'theses.title')
        ->join('theses', 'theses.id', '=', 'thesis_proposals.thesis_id')
        ->where('thesis_proposals.id', $id)
        ->get();

        return view('backend.seminar_proposal.supervisor.show', compact('theses', 't_statuses'));
    }
    // ACCEPT-REJECT
    function accepted(Request $request, $id){        
        // dd($request->grade);
        $file = ThesisProposal::find($id)->update([
                "status" => 1,
                "grade" => $request->grade
        ]);
        toastr()->success('Input sudah diterima');
        return redirect('/supervisor/seminar_proposal/detail/'.$id);
    }

    function rejected($id){
        dd('working_rejected');
        // $user_id = auth()->user();
        // $user = Lecturer::find($user_id)->pluck('id');

        // $theses = Theses::find($id)->update([
        //     "status" => 35,
        // ]);

        // $supervisor = ThesisSupervisor::where([
        //     ['thesis_id', '=', $id],
        //     ['lecturer_id', '=', $user],
        // ])->update(["status" => 2]);
        
        toastr()->error('Tugas Akhir sudah ditolak');
        // return redirect()->route('admin.supervisor.index');
    }

    public function download($id){
        try {
            $theses =  ThesisProposal::select('thesis_proposals.*', 'thesis_proposals.status as status', 'thesis_proposals.id as id', 'theses.title')
            ->join('theses', 'theses.id', '=', 'thesis_proposals.thesis_id')
            ->where('thesis_proposals.id', $id)
            ->get()->first();
    
            return Storage::download($theses->file_path);
        } 
        catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }
}
