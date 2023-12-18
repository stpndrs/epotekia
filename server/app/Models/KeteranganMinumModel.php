<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganMinumModel extends Model
{
    use HasFactory;

    protected $table = 'tb_keterangan_minum';
    protected $fillable = [
        'keterangan'
    ];

    public function getData($searchData)
    {
        $data = self::all();
        if ($searchData) {
            $data = self::where('keterangan', 'like', "%$searchData%")->all();
        }
        return $data;
    }
}
