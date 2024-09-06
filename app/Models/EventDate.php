<?php
// app/Models/EventDate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// app/Models/EventDate.php
class EventDate extends Model
{
    protected $fillable = ['event_id', 'event_date'];

    protected $casts = [
        'event_date' => 'date',
    ];
}


