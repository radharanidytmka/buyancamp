<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    protected $guarded = [];

    protected $table = 'reservasi';

    protected $fillable = [
        'nama_pemesan', 'email_pemesan', 'tgl_datang', 'tgl_pulang', 'durasi', 'fasilitas', 'status', 'request', 'subtotal_kemah', 'subtotal_fasilitas','total_bayar'
    ];

    public function getTotalAttribute()
    {
        return $this->subtotal_kemah + $this->subtotal_fasilitas;
    }

    public function detail(){
        return $this->hasMany(reservasi_detail::class);
    }    
}
