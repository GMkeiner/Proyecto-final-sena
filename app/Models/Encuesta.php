<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Encuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'respuesta1',
        'respuesta2',
        'respuesta3',
        'respuesta4',
        'respuesta5',
        'respuesta6',
        'respuesta7',
        'aprendiz_id'
    ];

    public function aprendiz(): BelongsTo{
        return $this->belongsTo(Aprendiz::class);
    }
}
