<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
}
