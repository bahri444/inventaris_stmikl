<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxSarana extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transaksi_sarana';
    protected $table = 'trx_sarana_periodik';
    protected $fillable = [
        'id_sarana',
        'id_tahun_akademik',
        'jumlah_like',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;

    public function scopeJoinToSarana($query)
    {
        return $query->leftJoin('tbl_sarana', 'tbl_sarana.id_sarana', '=', 'trx_sarana_periodik.id_sarana');
    }
    public function scopeJoinToRuang($query)
    {
        return $query->join('tbl_ruang', 'tbl_ruang.id_ruang', '=', 'tbl_sarana.id_ruang');
    }
    public function scopeJoinToTahunAkademik($query)
    {
        return $query->join('tahun_akademik', 'tahun_akademik.id_tahun_akademik', 'trx_sarana_periodik.id_tahun_akademik');
    }
}
