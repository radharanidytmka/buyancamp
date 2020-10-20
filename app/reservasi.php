<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    protected $table = 'reservasi';
    protected $fillable = [
        'nama_pemesan', 'email_pemesan', 'tgl_datang', 'tgl_pulang', 'durasi', 'fasilitas', 'status', 'request', 'total_bayar'
    ];
}
