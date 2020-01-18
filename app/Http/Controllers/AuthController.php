<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
// use App\Models\User;
use DB;

class AuthController extends Controller
{
  public function login(){

      return view('auth.login');
  }

  public function postlogin(Request $request){
    if ( Auth::attempt($request->only('username', 'password')) ){
          return redirect('home');
    }

    else{
      return redirect('login');
    }
    // dd($request->all());
    // return view();
  }

  public function logout(){
    Auth::logout();
    return redirect('login');
  }
}
