<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxPeriodik extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sarana_periodik';
    protected $table = 'trx_sarana_periodik';
    protected $fillable = [
        'id_sarana',
        'jumlah_total',
        'jumlah_like',
        'created_at',
        'updated_at',
    ];
    public $timestamps = false;

    public function scopeJoinToSarana($query)
    {
        return $query->join('id_sarana.tbl_sarana', '=', 'id_sarana.trx_sarana_periodik');
    }
}
