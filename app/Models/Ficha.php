<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Competencia;
use App\Models\Aprendiz;
use App\Models\Nota;
use App\Models\Asistencias;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ficha extends Model
{
    use HasFactory;
    protected $fillable=[
        'noFicha',
    ];
    public function aprendices():HasMany
    {
        return $this->hasMany(Aprendiz::class);
    }
    public function instructor(): BelongsToMany
    {
        return $this->belongsToMany(Instructores::class,'instrutor_fichas','ficha_id','instructor_id');
    }
    public function competencia(): BelongsToMany
    {
        return $this->belongsToMany(Competencia::class,'notas','ficha_id','competencia_id')->as('notas')->withPivot('notas')->using(Nota::class);
    }
    public function asistencia(): HasMany{
        return $this->hasMany(Asistencias::class);
    }
}
