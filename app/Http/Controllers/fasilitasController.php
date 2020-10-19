<?php

namespace App\Http\Controllers;

use \App\fasilitas;
use Illuminate\Http\Request;

class fasilitasController extends Controller
{
    public function facility(){
        $data_fasilitas = \App\fasilitas::all();
        return view('admin.facility', ['data_fasilitas' => $data_fasilitas]);
    }

    public function create(Request $request){
        $data = new fasilitas();
        $data->nama_fasilitas = $request->create_namafasilitas;
        $data->harga = $request->create_harga;
        $data->jumlah = $request->create_jumlah;
        $data->save();
        return redirect('facility');
    }
}
