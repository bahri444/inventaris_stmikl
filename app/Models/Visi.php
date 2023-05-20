<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_visi';
    protected $table = 'visi';
    protected $fillable = ['kode_program_studi', 'point_visi', 'created_at', 'updated_at'];
    public function JoinToTableProgramStudi()
    {
        return $this->hasOne(ProgramStudi::class, 'kode_program_studi', 'kode_program_studi');
    }
}
