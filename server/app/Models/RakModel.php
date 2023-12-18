<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RakModel extends Model
{
    use HasFactory;

    protected $table = 'tb_rak';
    protected $fillable = [
        'nama',
        'lokasi',
    ];

    public function getData($searchData)
    {
        $data = self::all();
        if ($searchData) {
            $data = self::where('nama', 'like', "%$searchData%")
                ->orWhere('lokasi', 'like', "%$searchData%")
                ->all();
        }
        return $data;
    }
}
