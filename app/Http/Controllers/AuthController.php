<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    public function warningRegistrasi() {
        return redirect('/register')->with(['warning' => 'Semua data harus diisi!']);
    }

    public function successAuthReg() {
        return redirect('/login')->with(['success' => 'Registrasi Sukses!']);
    }

    public function warningLogin() {
        return redirect('/login')->with(['warning' => 'Semua data harus diisi!']);
    }

    public function errorLogin() {
        return redirect('/login')->with(['error' => 'Email dan Password tidak sesuai!']);
    }

    public function successUpdate() {
        return redirect('/profile')->with(['success' => 'Update Berhasil!']);
    }

    public function errorUpdateProfile() {
        return redirect('/profile')->with(['error' => 'Format data tidak sesuai']);
    }

    // menampilkan halaman login
    public function login(){
        return view('login');
    }

    // proses login
    public function postlogin(Request $request){
        $rules = array( 
            'email' => 'required|email',
            'password' => 'required|max:25|alpha_num');
        $messages = array( 'required' => 'This field is required', 
            'max' => 'This field has maximum character',
            'min' => 'This field has minimum character',
            'email' => 'This field filled with email format'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if($validator->fails()){
            $message = $validator->messages();
            return redirect()->route('warningLogin')->withErrors($validator);
        } else {
            if(Auth::attempt($request->only('email','password'))){
                return redirect('/dashboard');
            }
            return redirect()->route('errorLogin');
        }
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
        $rules = array( 'reg_nama' => 'required|max:50',
        'reg_email' => 'required|email',
        'reg_no' => 'required|numeric',
        'reg_tgllahir' => 'required',
        'reg_alamat' => 'required|max:100',
        'reg_password' => 'required|min:6|max:25|alpha_num');
        $messages = array( 'required' => 'This field is required', 
        'max' => 'This field has maximum character',
        'min' => 'This field has minimum character',
        'email' => 'This field filled with email format'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if($validator->fails()){
            $message = $validator->messages();
            return redirect()->route('warningRegistrasi')->withErrors($validator);;
        } else {
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
            return redirect()->route('successRegistrasi');
        }
    }

    // menampilkan halaman profile
    public function profile(){
        return view('wisatawan.profile');
    }

    // proses edit user
    public function editProfile(Request $request, $id){
        $rules = array( 'edit_nama' => 'required|max:50',
        'edit_email' => 'required|email',
        'edit_no' => 'required|numeric',
        'edit_tgllahir' => 'required',
        'edit_alamat' => 'required|max:100',);
        $messages = array( 'required' => 'This field is required', 
        'max' => 'This field has maximum character',
        'email' => 'This field filled with email format'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if($validator->fails()){
            $message = $validator->messages();
            return redirect()->route('errorUpdate')->withErrors($validator);;
        } else {
            $data = User::where('id', $id)->first();
            $data->name = $request->edit_nama;
            $data->email = $request->edit_email;
            $data->no_telepon = $request->edit_no;
            $data->tgllahir = $request->edit_tgllahir;
            $data->alamat = $request->edit_alamat;
            $data->save();
            return redirect()->route('successUpdate');
        }
    }

    // menampilkan halaman list wisatawan
    public function showDataWisatawan(){
        $datawisatawan = User::where('role', 'wisatawan')->orderBy('id', 'ASC')->get();
        return view('admin.listUser', ['datawisatawan' => $datawisatawan]);
    }
}
