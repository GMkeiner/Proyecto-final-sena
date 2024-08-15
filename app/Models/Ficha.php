<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Competencia;
class Ficha extends Model
{
    use HasFactory;
    protected $fillable=[
        'noFicha',
    ];
    public function instructor(): BelongsToMany
    {
        return $this->belongsToMany(Instructores::class,'instrutor_fichas','ficha_id','instructor_id');
    }
    public function notas(): BelongsToMany
    {
        return $this->belongsToMany(Competencia::class,'notas','ficha_id','competencia_id')->as('notas');
    }
}
