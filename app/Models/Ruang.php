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
        'kode_ruang',
        'nama_ruang',
        'panjang',
        'lebar',
        'luas_ruang',
        'kapasitas',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;

    public function scopeJoinToBangunan($query)
    {
        return $query->join('id_bangunan.tbl_bangunan', 'id_bangunan.tbl_ruang');
    }
}
