<?php

// app/Models/Event.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// app/Models/Event.php
class Event extends Model
{
    protected $fillable = ['name', 'description'];

    public function dates()
    {
        return $this->hasMany(EventDate::class);
    }
}

// app/Models/EventDate.php
// class EventDate extends Model
// {
//     protected $fillable = ['event_id', 'event_date'];
// }

