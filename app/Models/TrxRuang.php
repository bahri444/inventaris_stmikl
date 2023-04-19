<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxRuang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_trx';
    protected $table = 'trx_kondisi_ruang';
    protected $fillable = [
        'id_ruang',
        'id_tahun_akademik',
        'kerusakan',
        'nilai_kerusakan',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;

    public function scopeJoinToRuang($query)
    {
        return $query->join('tbl_ruang', 'tbl_ruang.id_ruang', 'trx_kondisi_ruang.id_ruang');
    }
    public function scopeJoinToTahunAkademik($query)
    {
        return $query->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik', 'trx_kondisi_ruang.id_tahun_akademik');
    }
}
