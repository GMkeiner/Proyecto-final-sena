<?php

// app/Models/Event.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Ficha;

// app/Models/Event.php
class Event extends Model
{
    protected $fillable = ['ficha_id', 'mes1', 'mes2', 'mes3', 'hora'];

    public function ficha(): HasOne{
        return $this->hasOne(Ficha::class);
    }
    
    protected function mes1(): Attribute{
        return Attribute::make(
            get: fn (mixed $value) => json_decode($value,true),
            set: fn (array $value) => json_encode($value)
        );
    }
    protected function mes2(): Attribute{
        return Attribute::make(
            get: fn (mixed $value) => json_decode($value,true),
            set: fn (array $value) => json_encode($value)
        );
    }
    protected function mes3(): Attribute{
        return Attribute::make(
            get: fn (mixed $value) => json_decode($value,true),
            set: fn (array $value) => json_encode($value)
        );
    }
    protected function hora(): Attribute{
        return Attribute::make(
            get: fn (mixed $value) => json_decode($value,true),
            set: fn (array $value) => json_encode($value)
        );
    }
}

// app/Models/EventDate.php
// class EventDate extends Model
// {
//     protected $fillable = ['event_id', 'event_date'];
// }

