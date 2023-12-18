<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatModel extends Model
{
    use HasFactory;

    protected $table = 'tb_obat';
    protected $fillable = [
        'gambar',
        'nama',
        'jenis_id',
        'kategori_id',
        'rak_id',
        'harga',
        'stock',
        'keterangan_minum_id',
    ];

    public function getData()
    {
        return self::join('tb_jenis', 'tb_obat.jenis_id', 'tb_jenis.id')
        ->join('tb_kategori', 'tb_obat.kategori_id', 'tb_kategori.id')
        ->join('tb_rak', 'tb_obat.rak_id', 'tb_rak.id')
        ->join('tb_keterangan_minum', 'tb_obat.keterangan_minum_id', 'tb_keterangan_minum.id')
        ->get();
    }

    public function getDataById($id)
    {
        return self::join('tb_jenis', 'tb_obat.jenis_id', 'tb_jenis.id')
        ->join('tb_kategori', 'tb_obat.kategori_id', 'tb_kategori.id')
        ->join('tb_rak', 'tb_obat.rak_id', 'tb_rak.id')
        ->join('tb_keterangan_minum', 'tb_obat.keterangan_minum_id', 'tb_keterangan_minum.id')
        ->where('tb_obat.id', $id)
        ->first();
    }
}
