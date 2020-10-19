<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function profile(){
        return view('wisatawan.profile');
    }

    public function editProfile(Request $request, $id){
        $data = User::where('id', $id)->first();
        $data->name = $request->edit_nama;
        $data->email = $request->edit_email;
        $data->no_telepon = $request->edit_no;
        $data->alamat = $request->edit_alamat;
        $data->save();
        return redirect('profile');
    }
}
