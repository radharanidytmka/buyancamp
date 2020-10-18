<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class reservasiController extends Controller
{
    public function reservasi(){
        return view('wisatawan.reservation');
    }

    public function history(){
        return view('admin.history');
    }

    public function facility(){
        return view('admin.facility');
    }
}
