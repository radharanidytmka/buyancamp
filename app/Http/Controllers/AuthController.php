<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function register(){
        return view('/register');
    }

    public function postregister(Request $request){
        $data = new User();
        $data->role = 'Wisatawan';
        $data->name = $request->reg_nama;
        $data->email = $request->reg_email;
        $data->no_telepon = $request->reg_no;
        $data->alamat = $request->reg_alamat;
        $data->password = bcrypt($request->reg_password);
        $data->remember_token = str_random(60);
        $data->save();
        return redirect()->route('login');
    }

    public function todo(){
        return view('todo');
    }
}
