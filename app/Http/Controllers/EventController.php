<?php
// app/Http/Controllers/EventController.php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventDate;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{

    public function index()
{
    $events = Event::with('dates')->get();
    foreach ($events as $event) {
        foreach ($event->dates as $date) {
            // Asegúrate de que event_date es una instancia de Carbon
            $date->event_date = Carbon::parse($date->event_date);
        }
    }
    return view('events.index', compact('events'));
}


    public function create()
    {
        return view('events.create');
    }
   // app/Http/Controllers/EventController.php

// app/Http/Controllers/EventController.php
// app/Http/Controllers/EventController.php
public function edit(Event $event)
{
    // Convertir fechas a instancias de Carbon si es necesario
    $event->dates->transform(function ($date) {
        $date->event_date = \Carbon\Carbon::parse($date->event_date);
        return $date;
    });

    return view('events.edit', compact('event'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'event_dates' => 'required|array',
        'event_dates.*' => 'date',
    ]);

    $event = Event::create([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    foreach ($request->event_dates as $date) {
        EventDate::create([
            'event_id' => $event->id,
            'event_date' => Carbon::parse($date),
        ]);
    }

    return redirect()->route('events.index')->with('success', 'Evento creado con éxito.');
}


// app/Http/Controllers/EventController.php

// app/Http/Controllers/EventController.php
// app/Http/Controllers/EventController.php
public function update(Request $request, Event $event)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'event_dates' => 'required|array',
        'event_dates.*' => 'date',
    ]);
    $event->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    // Eliminar fechas anteriores
    $event->dates()->delete();

    // Agregar nuevas fechas
    foreach ($request->event_dates as $date) {
        EventDate::create([
            'event_id' => $event->id,
            'event_date' => \Carbon\Carbon::parse($date),
        ]);
    }

    return redirect()->route('events.index')->with('success', 'Evento actualizado con éxito.');
}

// app/Http/Controllers/EventController.php

public function destroy(Event $event)
{
    $event->dates()->delete(); // Eliminar fechas asociadas
    $event->delete(); // Eliminar el evento

    return redirect()->route('events.index')->with('success', 'Evento eliminado con éxito.');
}

}