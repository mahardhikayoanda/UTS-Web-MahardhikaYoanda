<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes; // Ini wajib untuk menggunakan SoftDeletes

    protected $fillable = [
        'nama_produk', 'kategori', 'harga', 'stok', 'deskripsi', 'tanggal_masuk'
    ];

    protected $dates = ['deleted_at']; // Pastikan 'deleted_at' ada di sini
}
