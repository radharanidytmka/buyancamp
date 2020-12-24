<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    protected $guarded = [];

    protected $table = 'reservasi';

    protected $fillable = [
        'id','nama_pemesan', 'email_pemesan', 'no_pemesan', 'tgl_datang', 'tgl_pulang', 'status_pembayaran', 'payment_token', 'payment_url', 'status_konfirmasi', 'subtotal_kemah', 'subtotal_fasilitas', 'total_bayar', 'created_at', 'updated_at'
    ];

    public const CREATED = 'created';
	public const CONFIRMED = 'confirmed';
	public const DELIVERED = 'delivered';
	public const COMPLETED = 'completed';
	public const CANCELLED = 'cancelled';

	public const ORDERCODE = 'INV';

	public const PAID = 'Sudah Dibayar';
	public const UNPAID = 'Menunggu Pembayaran';

    public function getTotalAttribute()
    {
        return $this->subtotal_kemah + $this->subtotal_fasilitas;
    }

    public function detail(){
        return $this->hasMany(reservasi_detail::class);
    }    
}
