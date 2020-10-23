<?php

namespace App\Http\Controllers;

use \App\reservasi;
use Illuminate\Http\Request;
use PDF;

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
        $data->status_pembayaran = 'Menunggu Pembayaran';
        $data->konfirmasi = "false";
        $data->request = $request->reservasi_request;
        $data->total_bayar = $request->reservasi_totalharga;
        $data->save();
        return redirect('pembayaran');
    }

    public function bayar($id){
        $data = reservasi::where('id', $id)->first();
        $data->status_pembayaran = 'Sudah Dibayar';
        $data->save();
        return redirect('dashboardwisatawan');
    }

    public function unduhpdf($id){
        $reservasi = reservasi::where('id', $id)->get();
        $pdf = PDF::loadView('wisatawan.unduhpdf', ['reservasi' => $reservasi]);
        return $pdf->download('reservasi.pdf');
    }

    public function checkin($id){
        $data = reservasi::where('id', $id)->first();
        $data->konfirmasi = 'true';
        $data->save();
        return redirect('dashboard');
    }

    public function history(){
        $datahistory = \App\reservasi::where('konfirmasi', 'true')->get();
        return view('admin.history', ['datahistory' => $datahistory]);
    }

    public function event(){
        return view('wisatawan.event');
    }
}
