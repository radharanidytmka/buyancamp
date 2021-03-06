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

    public function book($id)
    {
        $data = reservasi::where('id', $id)->first();
        $totalkemah = $data->subtotal_kemah;
        $totalfasilitas = $data->subtotal_fasilitas;
        $data->total_bayar = $totalkemah + $totalfasilitas;
        $data->save();
        $data = $this->_generatePaymentToken($data);   
        return redirect('/pembayaran');
    }

    private function _generatePaymentToken($reservasi){
        $this->initPaymentGateway();
        $customerDetails = [
            'first_name' => $reservasi->nama_pemesan,
            'email' => $reservasi->email_pemesan,
            'phone' => $reservasi->no_pemesan,
        ];
        $params = [
            'enable_payments' => \App\Payment::PAYMENT_CHANNELS,
            'transaction_details' => [
                "order_id" => $reservasi->id,
                "gross_amount" => $reservasi->total_bayar,
            ],
            'customer_details' => $customerDetails,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => \App\Payment::EXPIRY_UNIT,
                'duration' => \App\Payment::EXPIRY_DURATION,
            ],
        ];

        $snap = \Midtrans\Snap::createTransaction($params);
        
        if($snap->token){
            $reservasi->payment_token = $snap->token;
            $reservasi->payment_url = $snap->redirect_url;
            $reservasi->save(); 
        }
    }
}
