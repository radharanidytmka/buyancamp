<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservasi_detail extends Model
{
    protected $table = 'reservasi_detail';
    
    protected $fillable = [
        'reservasi_id', 'fasilitas_id', 'nama_fasilitas', 'harga', 'qty', 
    ];

    public function reservasi(){
        return $this->belongsTo(reservasi::class);
    }

    public function fasilitas(){
        return $this->belongsTo(fasilitas::class);
    }
}
