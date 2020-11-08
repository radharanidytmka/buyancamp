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

    // menampilkan halaman reservasi detail
    public function detail(){
        return view('wisatawan.reservationdetail');
    }

    // proses wisatawan reservasi
    public function create(Request $request){
        $data = new reservasi();
        $data->nama_pemesan = $request->reservasi_nama;
        $data->email_pemesan = $request->reservasi_email;
        $data->no_pemesan = $request->reservasi_no;
        $data->tgl_datang = $request->reservasi_tgldatang;
        $data->tgl_pulang = $request->reservasi_tglpulang;
        $data->durasi = $request->reservasi_durasi;
        $data->status_pembayaran = 'Menunggu Pembayaran';
        $data->status_konfirmasi = 'false';
        $data->total_bayar = 0;
        $data->save();
        return redirect('detail', $data);
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
        $pdf = PDF::loadView('wisatawan.unduhpdf', ['reservasi' => $reservasi])->setPaper('a4', 'portrait');
        return $pdf->download('reservasi.pdf');
    }

    // proses checkin
    public function checkin($id){
        $data = reservasi::where('id', $id)->first();
        $data->status_konfirmasi = 'true';
        $data->save();
        return redirect('dashboard');
    }

    // menampilkan data pada history admin
    public function history(){
        $datahistory = \App\reservasi::where('status_konfirmasi', 'true')->orderBy('id', 'DESC')->get();
        return view('admin.history', ['datahistory' => $datahistory]);
    }

    // menampilkan data dashboard admin
    public function admin(){
        $datareservasi_admin = \App\reservasi::where('status_pembayaran', 'Sudah Dibayar')
                                ->where('status_konfirmasi', 'false')->orderBy('id', 'DESC')->get();
        return view('admin.dashboard', ['datareservasi_admin' => $datareservasi_admin]);
    }

    // menampilkan data dashboard admin
    public function laporan(){
        return view('admin.laporankeuangan');
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
