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
        'nama_sarana',
        'spesifikasi',
        'kepemilikan',
        'jumlah_total',
        'jumlah_like',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
}
