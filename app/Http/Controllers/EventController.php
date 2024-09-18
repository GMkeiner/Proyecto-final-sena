<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventDate;
use App\Models\Ficha;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class EventController extends Controller
{

    public function index()
{
    // $events = Event::with('dates')->get();
    // foreach ($events as $event) {
    //     foreach ($event->dates as $date) {
    //         // Asegúrate de que event_date es una instancia de Carbon
    //         $date->event_date = Carbon::parse($date->event_date);
    //     }
    // }
    $fichas = Ficha::all();
    return view('events.index', ['fichas'=>$fichas]);
}


    public function create()
    {
        return view('events.create');
    }

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
        'nombre' => 'required|string|max:250',
        'ficha_id' => 'required|exists:fichas,id',
        'fecha_inicio' => 'required|date',
        'dias' => 'required|array',
        'dias.*' => 'string|max:10',
        'hora_inicio'=> 'required|string',
        'hora_final'=> 'required|string'
    ]);
    $fecha_inicial=Carbon::parse($request->fecha_inicio);
    $fecha_final=Carbon::parse($request->fecha_inicio)->addMonths(3);
    $trimestre = new CarbonPeriod($fecha_inicial, '1 day', $fecha_final);
    $meses = [];
    foreach($trimestre as $date){
        if(!in_array($date->month,array_keys($meses))){
            $meses[$date->month] = [];
        }
        if(in_array($date->englishDayOfWeek,$request->dias)){
            $meses[$date->month][] = $date->day;
        }
    }
    dd($meses);
    // $event = Event::create([
    //     'name' => $request->name,
    //     'description' => $request->description,
    // ]);

    // foreach ($request->event_dates as $date) {
    //     EventDate::create([
    //         'event_id' => $event->id,
    //         'event_date' => Carbon::parse($date),
    //     ]);
    // }

    return redirect()->route('events.index')->with('success', 'Evento creado con éxito.');
}

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

public function destroy(Event $event)
{
    $event->dates()->delete(); // Eliminar fechas asociadas
    $event->delete(); // Eliminar el evento

    return redirect()->route('events.index')->with('success', 'Evento eliminado con éxito.');
}

}