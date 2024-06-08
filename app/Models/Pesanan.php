<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'user_id',
        'genteng_id',
        'tanggal_pesanan',
        'total_pesanan',
        'jumlah_genteng',
        'status_pesanan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genteng()
    {
        return $this->belongsTo(Genteng::class);
    }
}
