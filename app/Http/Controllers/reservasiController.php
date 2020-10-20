<?php

namespace App\Http\Controllers;

use \App\reservasi;
use Illuminate\Http\Request;

class reservasiController extends Controller
{
    public function reservasi(){
        return view('wisatawan.reservation');
    }

    public function create(Request $request){
        $data = new reservasi();
        $data->nama_pemesan = $request->reservasi_nama;
        $data->email_pemesan = $request->reservasi_email;
        $data->tgl_datang = $request->reservasi_tgldatang;
        $data->tgl_pulang = $request->reservasi_tglpulang;
        $data->durasi = $request->reservasi_durasi;
        $data->fasilitas = $request->reservasi_fasilitas;
        $data->status = 'Menunggu Pembayaran';
        $data->request = $request->reservasi_request;
        $data->total_bayar = $request->reservasi_totalharga;
        $data->save();
        return redirect('reservasi');
    }

    public function history(){
        return view('admin.history');
    }

    public function event(){
        return view('wisatawan.event');
    }
}
