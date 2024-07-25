<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Aprendiz extends Model
{
    

    protected $fillable = [
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

}
