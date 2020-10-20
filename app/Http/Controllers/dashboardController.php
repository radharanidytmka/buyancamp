<?php

namespace App\Http\Controllers;

// use \App\reservasi;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function admin(){
        $datareservasi_admin = \App\reservasi::all();
        return view('admin.dashboard', ['datareservasi_admin' => $datareservasi_admin]);
    }

    public function wisatawan(){
        $datareservasi_wisatawan = \App\reservasi::where('email_pemesan', auth()->user()->email)->get();
        return view('wisatawan.dashboardwisatawan', ['datareservasi_wisatawan' => $datareservasi_wisatawan]);
    }
}
