<?php

namespace App\Http\Controllers;

use \App\reservasi;
use \App\fasilitas;
use Illuminate\Http\Request;
use PDF;
use DateTime;

class reservasiController extends Controller
{
    public function successCheckIn() {
        return redirect('/dashboard')->with(['success' => 'Konfirmasi Berhasil!']);
    }

    // menampilkan halaman booking 
    public function reservasi(){
        return view('wisatawan.reservation');
    }

    // menampilkan halaman event
    public function event(){
        return view('wisatawan.event');
    }

    // menampilkan halaman reservasi detail
    public function detail($id){
        $reservasi = reservasi::with(['detail', 'detail.fasilitas'])->where('id',$id)->get();
        $fasilitas = fasilitas::orderBy('nama_fasilitas', 'ASC')->get();
        return view('wisatawan.reservationdetail', compact('reservasi', 'fasilitas'));
    }

    // proses wisatawan reservasi
    public function create(Request $request){
        $data = new reservasi();
        $data->nama_pemesan = $request->reservasi_nama;
        $data->email_pemesan = $request->reservasi_email;
        $data->no_pemesan = $request->reservasi_no;
        $data->tgl_datang = $request->reservasi_tgldatang;
        $data->tgl_pulang = $request->reservasi_tglpulang;
        $data->status_pembayaran = 'Menunggu Pembayaran';
        $data->status_konfirmasi = 'false';
        $dtg = new DateTime($request->reservasi_tgldatang);
        $plg =new DateTime($request->reservasi_tglpulang);
        $diff = $dtg->diff($plg);
        $data->total_bayar = $diff->d * 25000;
        $data->save();
        return redirect()->route('detail', ['id' => $data->id]);
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
        $reservasi = reservasi::with(['detail', 'detail.fasilitas'])->where('id', $id)->get();
        $pdf = PDF::loadView('wisatawan.unduhpdf', compact('reservasi'))->setPaper('a4', 'landscape');
        return $pdf->download('reservasi.pdf');
    }

    // proses checkin
    public function konfirmasiReservasi($id){
        $data = reservasi::where('id', $id)->first();
        $data->status_konfirmasi = 'true';
        $data->save();
        return redirect()->route('successCheckIn');
    }

    // menampilkan data pada history admin
    public function history(){
        $datahistory = \App\reservasi::with(['detail', 'detail.fasilitas'])->where('status_konfirmasi', 'true')->orderBy('id', 'DESC')->get();
        return view('admin.history', compact('datahistory'));
    }

    // menampilkan data dashboard admin
    public function dashboardAdmin(){
        $datareservasi_admin = \App\reservasi::with(['detail', 'detail.fasilitas'])->where('status_pembayaran', 'Sudah Dibayar')
                                ->where('status_konfirmasi', 'false')->orderBy('id', 'DESC')->get();
        return view('admin.dashboard', compact('datareservasi_admin'));
    }

    // menampilkan data dashboard wisatawan
    public function dashboardWisatawan(){
        $datareservasi_wisatawan = \App\reservasi::with(['detail', 'detail.fasilitas'])->where('email_pemesan', auth()->user()->email)
                                    ->where('status_pembayaran', 'Sudah Dibayar')->orderBy('id', 'DESC')->get();
        return view('wisatawan.dashboardwisatawan', ['datareservasi_wisatawan' => $datareservasi_wisatawan]);
    }

    // menampilkan data wisatawan yang belum bayar 
    public function pembayaran(){
        $datareservasi_belumbayar = \App\reservasi::with(['detail', 'detail.fasilitas'])->where('email_pemesan', auth()->user()->email)
                                    ->where('status_pembayaran', 'Menunggu Pembayaran')->orderBy('id', 'DESC')->get();
        return view('wisatawan.pembayaran', ['datareservasi_belumbayar' => $datareservasi_belumbayar]);
    }
}
