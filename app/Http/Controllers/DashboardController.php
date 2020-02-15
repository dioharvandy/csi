<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user_id = auth()->user();
        $user = Student::find($user_id)->pluck('id', $user_id);
        // dd($user);
        return view('dashboards.index');
    }
}
