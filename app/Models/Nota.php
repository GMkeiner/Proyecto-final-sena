<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Casts\Attribute;
class Nota extends Pivot
{
    use HasFactory;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected function notas(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => json_decode($value),
            set: fn (mixed $value) => json_encode($value),
        );
    }
}
