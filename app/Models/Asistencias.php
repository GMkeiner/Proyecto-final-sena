<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencias extends Model
{
    protected $fillable = ['id_aprendiz', 'id_event', 'datos_asistencia'];

    protected $casts = [
        'datos_asistencia' => 'array',
    ];

    public function aprendiz()
    {
        return $this->belongsTo(Aprendiz::class, 'id_aprendiz');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
}
