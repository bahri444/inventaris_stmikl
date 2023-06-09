<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sarana';
    protected $table = 'tbl_sarana';
    protected $fillable = [
        'id_ruang',
        'id_tahun_akademik',
        'nama_sarana',
        'spesifikasi',
        'kepemilikan_sarana',
        'jumlah_total',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
    public function scopeJoinToRuang($query)
    {
        return $query->join('tbl_ruang', 'tbl_ruang.id_ruang', '=', 'tbl_sarana.id_ruang');
    }
    public function scopeJoinToBangunan($query)
    {
        return $query->join('tbl_bangunan', 'tbl_bangunan.id_bangunan', '=', 'tbl_ruang.id_bangunan');
    }
    public function scopeJoinToTahunAkademik($query)
    {
        return $query->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik', '=', 'tbl_sarana.id_tahun_akademik');
    }
}
