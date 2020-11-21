<?php

namespace App\Http\Controllers;

use \App\reservasi;
use \App\fasilitas;
use \App\reservasi_detail;
use Illuminate\Http\Request;

class reservasiDetailController extends Controller
{
    public function save(Request $request, $id){
        $reservasi = reservasi::find($id);
        $fasilitas = fasilitas::find($request->fasilitas_id);
        $reservasi_detail = $reservasi->detail()->where('fasilitas_id', $fasilitas->id)->first();
        if($reservasi_detail){
            $reservasi_detail->update([
                'qty' => $reservasi_detail->qty + $request->qty
            ]);
        } else {
            reservasi_detail::create([
                'reservasi_id' => $reservasi->id,
                'fasilitas_id' => $request->fasilitas_id,
                'harga' => $fasilitas->harga,
                'qty' => $request->qty
            ]);
        }
        return redirect()->back()->with(['success' => 'Product Telah Ditambahkan']);
    }

    public function deleteFasilitas($id)
    {
        $detail = reservasi_detail::find($id);
        $detail->delete();
        return redirect()->back()->with(['success' => 'Product telah dihapus']);
    }
}
