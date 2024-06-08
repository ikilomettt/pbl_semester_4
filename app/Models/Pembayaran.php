<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';

    protected $fillable = [
        'pesanan_id',
        'tanggal_pembayaran',
        'metode_pembayaran',
        'jumlah_pembayaran',
        'bukti_pembayaran',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
