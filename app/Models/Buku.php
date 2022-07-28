<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';

    protected $fillable = ['id','judul_buku', 'penulis_buku', 'penerbit_buku', 'tahun_penerbit', 'stok'];
}
