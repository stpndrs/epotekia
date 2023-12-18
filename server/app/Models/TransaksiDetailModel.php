<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetailModel extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi_transaksi';
    protected $fillable = [
        'transaksi_id',
        'obat_id',
        'qty',
        'sub_total',
    ];
}
