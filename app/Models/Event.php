<?php

// app/Models/Event.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Ficha;

// app/Models/Event.php
class Event extends Model
{
    protected $fillable = ['ficha_id', 'mes1', 'mes2', 'mes3', 'hora'];

    public function ficha(): HasOne{
        return $this->hasOne(Ficha::class);
    }
    protected function casts(): array
    {
        return [
            'mes1' => 'array',
            'mes2' => 'array',
            'mes3' => 'array',
            'hora' => 'array',
        ];
    }
}

// app/Models/EventDate.php
// class EventDate extends Model
// {
//     protected $fillable = ['event_id', 'event_date'];
// }

