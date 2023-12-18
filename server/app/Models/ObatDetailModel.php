<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatDetailModel extends Model
{
    use HasFactory;

    protected $table = 'tb_obat_detail';
    protected $fillable = [
        'obat_id',
        'kode_obat',
        'kadaluarsa',
        'tanggal_masuk',
    ];

    public function getDataByObatId($id)
    {
        return self::where('obat_id', $id)->get();
    }
}
