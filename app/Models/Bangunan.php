<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bangunan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_bangunan';
    protected $table = 'tbl_bangunan';
    protected $fillable = [
        'id_sarana',
        'jenis_bangunan',
        'nama_bangunan',
        'panjang',
        'lebar',
        'luas_tapak',
        'kepemilikan',
        'tahun_dibangun',
        'tanggal_sk_pemakaian',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;

    public function scopeJoinToSarana($query)
    {
        return $query->join('id_sarana.tbl_sarana', '=', 'id_sarana.bangunan');
    }
}
