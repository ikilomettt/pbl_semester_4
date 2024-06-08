<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengirimans';

    protected $fillable = [
        'pesanan_id',
        'tanggal_pesanan',
        'alamat',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
