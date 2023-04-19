<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VisiMisi;

class ProgramStudi extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_program_studi';
    protected $table = 'program_studi';
    protected $fillable = ['kode_program_studi', 'nama_program_studi'];
    public $timestamps = false;

    public function visiMisi()
    {
        return $this->belongsTo(VisiMisi::class, 'kode_program_studi', 'kode_program_studi');
    }
}
