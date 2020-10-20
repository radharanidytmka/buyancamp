<?php

namespace App\Http\Controllers;

use \App\reservasi;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function admin(){
        return view('admin.dashboard');
        // $datareservasi_admin = \App\reservasi::all();
        // return view('admin.dashboard', ['datareservasi_admin' => $datareservasi_admin]);
    }

    public function wisatawan(){
        // $datareservasi_wisatawan = reservasi::where('email', $email)->first();
        $datareservasi_wisatawan = \App\reservasi::all();
        return view('wisatawan.dashboardwisatawan', ['datareservasi_wisatawan' => $datareservasi_wisatawan]);
    }
}
