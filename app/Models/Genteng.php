<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genteng extends Model
{
    use HasFactory;

    protected $table = 'gentengs';
    protected $fillable = [
        'gambar',
        'nama_product',
        'stok',
        'harga',
        'deskripsi',
        'category_id'
    ];
}
