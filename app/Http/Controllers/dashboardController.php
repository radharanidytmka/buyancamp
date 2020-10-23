<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function admin(){
        $datareservasi_admin = \App\reservasi::where('status_pembayaran', 'Sudah Dibayar')
                                ->where('konfirmasi', 'false')->get();
        return view('admin.dashboard', ['datareservasi_admin' => $datareservasi_admin]);
    }

    public function wisatawan(){
        $datareservasi_wisatawan = \App\reservasi::where('email_pemesan', auth()->user()->email)
                                    ->where('status_pembayaran', 'Sudah Dibayar')->get();
        return view('wisatawan.dashboardwisatawan', ['datareservasi_wisatawan' => $datareservasi_wisatawan]);
    }

    public function pembayaran(){
        $datareservasi_belumbayar = \App\reservasi::where('email_pemesan', auth()->user()->email)
                                    ->where('status_pembayaran', 'Menunggu Pembayaran')->get();
        return view('wisatawan.pembayaran', ['datareservasi_belumbayar' => $datareservasi_belumbayar]);
    }
}
