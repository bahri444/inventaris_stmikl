<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProgramStudi;

class VisiMisi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_visi_misi';
    protected $table = 'visi_misi';
    protected $fillable = ['kode_program_studi',    'visi_dan_misi', 'created_at', 'updated_at'];
    public $timestamps = false;

    public function programStudi()
    {
        return $this->hasOne(ProgramStudi::class, 'kode_program_studi', 'kode_program_studi');
    }
}
