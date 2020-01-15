<?php

namespace App\Http\Controllers;
use App\ThesisSeminar;
use App\ThesisProposal;
use App\Thesis;
use DB;
use Illuminate\Http\Request;

class ThesisSeminarController extends Controller
{
    public function index()
    {
        $thesisseminars = DB::table('thesis_seminars')
                          ->join('theses', 'thesis_seminars.thesis_id', '=', 'theses.thesis_id')
                          ->join('thesis_proposals', 'theses.thesis_id', '=', 'thesis_proposals.thesis_id')
                          ->select('thesis_seminars.id', 'thesis_seminars.registered_at', 'thesis_seminars.seminar_at', 'thesis_seminars.status', DB::raw('(CASE WHEN thesis_seminars.status = 1 THEN '. "'Mengajukan'".'END) AS status_semhas'))
                          ->paginate(3);

        /*$statuss        = DB::table('thesis_seminars')
                          ->select('status', DB::raw('(CASE WHEN status = 1 THEN '. "'Mengajukan'".'END)'))
                          ->distinct();*/

        return view('backend.thesis_seminar.index', compact('thesisseminars'));
    }
    
    public function create()
    {
      /*$ruangan = Ruangan::all()->pluck('nama','id');
      $mahasiswa = DB::table('ta_semhas')
                  ->join('ta_sempro', 'ta_semhas.ta_sempro_id', '=' , 'ta_sempro.id')
                  ->join('tugas_akhir','ta_sempro.tugas_akhir_id', '=', 'tugas_akhir.id')
                  ->join('mahasiswa', 'tugas_akhir.mahasiswa_id', '=', 'mahasiswa.id')
                  ->select('ta_sempro.id','mahasiswa.nama')
                  ->pluck('mahasiswa.nama','ta_semhas.id');
      $rekomendasi = DB::table('ta_semhas')
                    ->select('rekomendasi', DB::raw('(CASE WHEN rekomendasi = 1 THEN '. "'Mengulang Seminar'" .'WHEN rekomendasi = 2 THEN '. "'Lanjut Sidang dengan Revisi'".'WHEN rekomendasi = 3 THEN '."'Lanjut Sidang Tanpa Revisi'".'END) AS rekomendasi_semhas'))
                    ->distinct()
                    ->pluck('rekomendasi_semhas','rekomendasi');*/
      return view('backend.thesis_seminar.create');
    }

    public  function store(Request $request)
    {
        $request->validate([
            'thesis_id'=>'required',
            'file_report' =>'file|mimes:pdf'
        ]);
    	    $semhas = new ThesisSeminar();
            $semhas->thesis_id = $request->input('thesis_id');
      
            if($request->file('file_report')->isValid())
            {
                $filename = uniqid('laporan-');
                $fileext = $request->file('file_report')->extension();
                $filenameext = $filename.'.'.$fileext;
                $filepath = $request->file_report->storeAs('/laporan_ta',$filenameext);
                $semhas->file_report = $filepath;
            }
            $semhas->save();
      
            return redirect()->route('admin.semhas.show',[$semhas->id]);      
    }
}
