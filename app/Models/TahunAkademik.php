<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tahun_akademik';
    protected $table = 'tahun_akademik';
    protected $fillable = [
        'semester',
        'tahun',
        'created_at',
        'updated_at'
    ];
    public $timestamps = false;
}
