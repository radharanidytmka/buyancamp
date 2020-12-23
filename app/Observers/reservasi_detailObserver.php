<?php

namespace App\Observers;

use App\reservasi_detail;
use App\reservasi;

class reservasi_detailObserver
{
    /**
     * Handle the reservasi_detail "created" event.
     *
     * @param  \App\reservasi_detail  $invoiceDetail
     * @return void
     */

    private function generateTotal($reservasiDetail)
    {
        $reservasi_id = $reservasiDetail->reservasi_id;
        $reservasi_detail = reservasi_detail::where('reservasi_id', $reservasi_id)->get();
        $subtotal_fasilitas = $reservasi_detail->sum(function($i) {
            return $i->harga * $i->qty;
        });
        $reservasiDetail->reservasi()->update([
            'subtotal_fasilitas' => $subtotal_fasilitas
        ]);
    }

    public function created(reservasi_detail $reservasiDetail)
    {
        $this->generateTotal($reservasiDetail);
    }

    /**
     * Handle the reservasi_detail "updated" event.
     *
     * @param  \App\reservasi_detail  $invoiceDetail
     * @return void
     */
    public function updated(reservasi_detail $reservasiDetail)
    {
        $this->generateTotal($reservasiDetail);
    }

    /**
     * Handle the reservasi_detail "deleted" event.
     *
     * @param  \App\reservasi_detail  $reservasiDetail
     * @return void
     */
    public function deleted(reservasi_detail $reservasiDetail)
    {
        $this->generateTotal($reservasiDetail);
    }

    /**
     * Handle the reservasi_detail "restored" event.
     *
     * @param  \App\reservasi_detail  $reservasiDetail
     * @return void
     */
    public function restored(reservasi_detail $reservasiDetail)
    {
        //
    }

    /**
     * Handle the reservasi_detail "force deleted" event.
     *
     * @param  \App\reservasi_detail  $reservasiDetail
     * @return void
     */
    public function forceDeleted(reservasi_detail $reservasiDetail)
    {
        //
    }
}
