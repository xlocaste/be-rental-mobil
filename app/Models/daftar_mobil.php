<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar_mobil extends Model
{
    use HasFactory;

    protected $table = 'daftar_mobil';

    protected $fillable = [
        'image',
        'nama',
        'merk',
        'kursi',
        'bahan_bakar',
        'harga',
    ];
}
