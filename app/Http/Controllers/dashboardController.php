<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function admin(){
        $datareservasi_admin = \App\reservasi::where('status', 'Sudah Dibayar')->get();
        return view('admin.dashboard', ['datareservasi_admin' => $datareservasi_admin]);
    }

    public function wisatawan(){
        $datareservasi_wisatawan = \App\reservasi::where('email_pemesan', auth()->user()->email)->get();
        return view('wisatawan.dashboardwisatawan', ['datareservasi_wisatawan' => $datareservasi_wisatawan]);
    }

    public function tunggubayar(){
        $datareservasi_tunggubayar = wisatawan::where('status', 'Menunggu Pembayaran')->get();
        return view('wisatawan.dashboardwisatawan', ['datareservasi_tunggubayar' => $datareservasi_tunggubayar]);
    }
}
