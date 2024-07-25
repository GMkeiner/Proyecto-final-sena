<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencias extends Model
{
    use HasFactory;
    protected $fillable=[
        'noAsistencias',
        'noInasistencias',
        'noExcusas',
        'comentario',
        'aprendiz_id',
    ];

    public function aprendiz(){
        return $this->belongsTo(aprendiz::class);
    }
}
