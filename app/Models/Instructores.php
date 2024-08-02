<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Instructores extends Model
{
    use HasFactory;
    protected $table = 'instructors';
    protected $fillable =[
        'documento',
        'nombre',
        'apellido',
        'correo',
        'telefono',
    ];
    public function ficha(): BelongsToMany
    {
        return $this->belongsToMany(Ficha::class,'instrutor_fichas','instructor_id');
    }
}
