<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Asistencias extends Model
{
    protected $fillable = ['ficha_id', 'asistieron', 'no_asistieron', 'evento'];

    public function ficha(): BelongsTo{
        return $this->belongsTo(Ficha::class);
    }
    
    protected function casts(): array
    {
        return [
            'asistieron' => 'array',
            'no_asistieron' => 'array',
            'evento' => 'array',
        ];
    }
}
