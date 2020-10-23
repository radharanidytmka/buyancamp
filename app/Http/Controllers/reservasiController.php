<?php

namespace App\Http\Controllers;

use \App\reservasi;
use Illuminate\Http\Request;
use PDF;

class reservasiController extends Controller
{
    // menampilkan halaman booking 
    public function reservasi(){
        return view('wisatawan.reservation');
    }

    // menampilkan halaman event
    public function event(){
        return view('wisatawan.event');
    }

    // proses wisatawan reservasi
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

    // proses pembayaran
    public function bayar($id){
        $data = reservasi::where('id', $id)->first();
        $data->status_pembayaran = 'Sudah Dibayar';
        $data->save();
        return redirect('dashboardwisatawan');
    }

    // proses export receipt pdf
    public function unduhpdf($id){
        $reservasi = reservasi::where('id', $id)->get();
        $pdf = PDF::loadView('wisatawan.unduhpdf', ['reservasi' => $reservasi]);
        return $pdf->download('reservasi.pdf');
    }

    // proses checkin
    public function checkin($id){
        $data = reservasi::where('id', $id)->first();
        $data->konfirmasi = 'true';
        $data->save();
        return redirect('dashboard');
    }

    // menampilkan data pada history admin
    public function history(){
        $datahistory = \App\reservasi::where('konfirmasi', 'true')->orderBy('id', 'DESC')->get();
        return view('admin.history', ['datahistory' => $datahistory]);
    }

    // menampilkan data dashboard admin
    public function admin(){
        $datareservasi_admin = \App\reservasi::where('status_pembayaran', 'Sudah Dibayar')
                                ->where('konfirmasi', 'false')->orderBy('id', 'DESC')->get();
        return view('admin.dashboard', ['datareservasi_admin' => $datareservasi_admin]);
    }

    // pencarian pada dashboard admin
    public function cariDashboard(Request $request){
        $cari = $request->cari;
        $datareservasi_admin = \App\reservasi::where('status_pembayaran', 'Sudah Dibayar')
                                ->where('konfirmasi', 'false')
                                ->where('nama_pemesan','like',"%".$cari."%")->orderBy('id', 'DESC')->get();
        return view('admin.dashboard', ['datareservasi_admin' => $datareservasi_admin]);
    }

    // menampilkan data dashboard wisatawan
    public function wisatawan(){
        $datareservasi_wisatawan = \App\reservasi::where('email_pemesan', auth()->user()->email)
                                    ->where('status_pembayaran', 'Sudah Dibayar')->orderBy('id', 'DESC')->get();
        return view('wisatawan.dashboardwisatawan', ['datareservasi_wisatawan' => $datareservasi_wisatawan]);
    }

    // menampilkan data wisatawan yang belum bayar 
    public function pembayaran(){
        $datareservasi_belumbayar = \App\reservasi::where('email_pemesan', auth()->user()->email)
                                    ->where('status_pembayaran', 'Menunggu Pembayaran')->orderBy('id', 'DESC')->get();
        return view('wisatawan.pembayaran', ['datareservasi_belumbayar' => $datareservasi_belumbayar]);
    }
}
