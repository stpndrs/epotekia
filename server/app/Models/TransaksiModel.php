<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';
    protected $fillable = [
        'nama_pelanggan',
        'notelp_pelanggan',
        'usia_pelanggan',
        'user_id',
        'grand_total',
        'waktu'
    ];
}
