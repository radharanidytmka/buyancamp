<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservasi_detail extends Model
{
    protected $guarded = [];

    protected $table = 'reservasi_detail';
    
    protected $fillable = [
        'reservasi_id', 'fasilitas_id', 'nama_fasilitas', 'harga', 'qty', 
    ];

    public function getSubtotalAttribute()
    {
        return number_format($this->qty * $this->harga);
    }

    public function reservasi(){
        return $this->belongsTo(reservasi::class);
    }

    public function fasilitas(){
        return $this->belongsTo(fasilitas::class);
    }
}
