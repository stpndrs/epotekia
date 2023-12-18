<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'tb_kategori';
    protected $fillable = [
        'nama'
    ];

    public function getData($searchData)
    {
        $data = self::all();
        if ($searchData) {
            $data = self::where('nama', 'like', "%$searchData%")->all();
        }
        return $data;
    }
}
