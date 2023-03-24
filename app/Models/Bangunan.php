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
        'id_tanah',
        'jenis_bangunan',
        'nama_bangunan',
        'panjang_bangunan',
        'lebar_bangunan',
        'luas_tapak',
        'kepemilikan',
        'tahun_dibangun',
        'tanggal_sk_pemakaian',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
    public function scopeJoinToTanah($query)
    {
        return $query->join('tbl_tanah', 'tbl_tanah.id_tanah', '=', 'tbl_bangunan.id_tanah');
    }
}
