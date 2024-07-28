<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aprendiz extends Model
{
    

    protected $fillable = [
        'user_id',
        'documento',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'ficha_id',
    ];

    public function ficha(){
        return $this->belongsTo(Ficha::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
