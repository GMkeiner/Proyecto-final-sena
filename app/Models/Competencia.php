<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Competencia extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'instructor_id'
    ];
    public function instructor(): BelongsTo
    {
        return $this->belongsTo(Instructores::class);
    }
}
