<?php

namespace App\Http\Controllers;
use App\ThesisSemAudience;
use App\Models\Student;
use DB;
use Illuminate\Http\Request;

class ThesisSemAudienceController extends Controller
{
    public function index($id)
    {
        $statuss = DB::table('thesis_seminars') 
                ->select('thesis_seminars.status')
                ->where('thesis_seminars.id','=', $id)
                ->get();

        foreach($statuss as $status)
        {
            foreach($status as $st)
            {
                if($st != 10)
                {
                    $semhass=DB::table('thesis_seminars')
                            ->join('thesis_sem_audiences','thesis_seminars.id','=','thesis_sem_audiences.thesis_seminar_id')
                            ->join('students','thesis_sem_audiences.student_id','=','students.id')
                            ->select('thesis_sem_audiences.id','students.nim','students.name','thesis_sem_audiences.student_id')
                            ->where('thesis_seminars.id','=', $id)
                            ->paginate(20);
                    return view('backend.thesissem_audience.index', compact('semhass', 'id'));
                }
                elseif($st == 10)
                {
                    return redirect()->route('admin.semhas.index')->with('message', 'Anda belum melaksanakan seminar hasil');
                }
            }
        }
    }
    public function create($id)
    {
        $students = Student::all()->pluck('name','id');
    	return view('backend.thesissem_audience.create',compact('students','id'));
    }
    public function store(Request $request)
    {
    	$request->validate([
            'thesis_seminar_id'=>'required',
            'student_id' => 'required' 
        ]);
        
    	$pesertas = new ThesisSemAudience();
        $pesertas->thesis_seminar_id = $request->input('thesis_seminar_id');
        $pesertas->student_id = $request->input('student_id');
        $pesertas->save();

        return redirect()->route('admin.pesertasemhas.index',[$pesertas->thesis_seminar_id])->with('message', 'Berhasil menambahkan peserta seminar');
    }
    
    public function destroy($id)
    {
        $semhass = ThesisSemAudience::find($id);
        $semhass->delete();
        return redirect()->route('admin.pesertasemhas.index',[$semhass->thesis_seminar_id])->with('message', 'Berhasil menghapus data peserta seminar');
    }
}
