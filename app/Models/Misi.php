<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_misi';
    protected $table = 'misi';
    protected $fillable = ['kode_program_studi', 'point_misi', 'created_at', 'updated_at'];

    public function JoinToTableProgramStudi()
    {
        return $this->hasMany(ProgramStudi::class, 'kode_program_studi', 'kode_program_studi');
    }
    public function JoinToTableSubMisi()
    {
        return $this->hasMany(SubMisi::class, 'id_misi', 'id_misi');
    }
}
