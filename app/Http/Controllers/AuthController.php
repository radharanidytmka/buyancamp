<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // menampilkan halaman login
    public function login(){
        return view('login');
    }

    // proses login
    public function postlogin(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    // proses logout
    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    // menampilkan halaman register
    public function register(){
        return view('/register');
    }

    // proses register
    public function postregister(Request $request){
        $data = new User();
        $data->role = 'wisatawan';
        $data->name = $request->reg_nama;
        $data->email = $request->reg_email;
        $data->no_telepon = $request->reg_no;
        $data->tgllahir = $request->reg_tgllahir;
        $data->alamat = $request->reg_alamat;
        $data->password = bcrypt($request->reg_password);
        $data->remember_token = str_random(60);
        $data->save();
        return redirect()->route('login');
    }

    // menampilkan halaman profile
    public function profile(){
        return view('wisatawan.profile');
    }

    // proses edit user
    public function editProfile(Request $request, $id){
        $data = User::where('id', $id)->first();
        $data->name = $request->edit_nama;
        $data->email = $request->edit_email;
        $data->no_telepon = $request->edit_no;
        $data->tgllahir = $request->edit_tgllahir;
        $data->alamat = $request->edit_alamat;
        $data->save();
        return redirect('profile');
    }

    // menampilkan halaman list wisatawan
    public function listWisatawan(){
        $datawisatawan = User::where('role', 'wisatawan')->orderBy('id', 'ASC')->get();
        return view('admin.listUser', ['datawisatawan' => $datawisatawan]);
    }
}
