<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMisi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_sub_misi';
    protected $table = 'sub_misi';
    protected $fillable = ['id_misi', 'point_sub_misi', 'created_at', 'updated_at'];

    public function JoinToTableMisi()
    {
        return $this->hasMany(Misi::class, 'id_misi', 'id_misi');
    }
    public function JoinToProgramStudi()
    {
        return $this->hasMany(ProgramStudi::class, 'kode_program_studi', 'kode_program_studi');
    }
}
