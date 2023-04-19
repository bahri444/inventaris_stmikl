<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ruang';
    protected $table = 'tbl_ruang';
    protected $fillable = [
        'id_bangunan',
        'id_tahun_akademik',
        'kode_ruang',
        'nama_ruang',
        'panjang_ruang',
        'lebar_ruang',
        'luas_ruang',
        'kapasitas',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;

    public function scopeJoinToBangunan($query)
    {
        return $query->join('tbl_bangunan', 'tbl_bangunan.id_bangunan', 'tbl_ruang.id_bangunan');
    }

    public function scopeJoinToTahunAkademik($query)
    {
        return $query->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik', 'tbl_ruang.id_tahun_akademik');
    }
}
