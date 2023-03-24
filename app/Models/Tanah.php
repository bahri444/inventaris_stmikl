<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sarana';
    protected $table = 'tbl_lahan';
    protected $fillable = [
        'jenis_prasarana',
        'nama_prasarana',
        'no_sertifikat_tanah',
        'panjang_tanah',
        'lebar_tanah',
        'luas_lahan_tersedia',
        'kepemilikan',
        'alamat',
        'rt',
        'rw',
        'nama_dusun',
        'desa_kelurahan',
        'kecamatan',
        'kode_pos',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
}
