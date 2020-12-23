<?php

namespace App\Http\Controllers;

use \App\reservasi;
use \App\fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use PDF;
use DateTime;

class reservasiController extends Controller
{
    public function successCheckIn() {
        return redirect('/dashboard')->with(['success' => 'Konfirmasi Berhasil!']);
    }

    public function warningReservasi() {
        return redirect('/reservasi')->with(['warning' => 'Semua data harus diisi!']);
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
    public function createReservasi(Request $request){
        $rules = array( 'reservasi_tgldatang' => 'required',
            'reservasi_tglpulang' => 'required');
        $messages = array( 'required' => 'This field is required',
        );
        $validator = Validator::make(Input::all(), $rules, $messages);
        if($validator->fails()){
            $message = $validator->messages();
            return redirect()->route('warningReservasi')->withErrors($validator);
        } else {
            $data = new reservasi();
            $data->nama_pemesan = $request->reservasi_nama;
            $data->email_pemesan = $request->reservasi_email;
            $data->no_pemesan = $request->reservasi_no;
            $data->tgl_datang = $request->reservasi_tgldatang;
            $data->tgl_pulang = $request->reservasi_tglpulang;
            $data->status_pembayaran = 'Menunggu Pembayaran';
            $data->payment_token = '';
            $data->payment_url = '';
            $data->status_konfirmasi = 'false';
            $dtg = new DateTime($request->reservasi_tgldatang);
            $plg =new DateTime($request->reservasi_tglpulang);
            $diff = $dtg->diff($plg);
            $data->subtotal_kemah = $diff->d * 25000;
            $data->subtotal_fasilitas = 0;
            $data->total_bayar = 0;
            $data->save();
            return redirect()->route('detail', ['id' => $data->id]);
        }
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

    // proses pembayaran
    public function bayar($id){
        $data = reservasi::where('id', $id)->first();
        $data->status_pembayaran = 'Sudah Dibayar';
        $data->save();
        return redirect('dashboardwisatawan');
    }
}
