<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventDate;
use App\Models\Ficha;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateTime;

class EventController extends Controller
{

    public function fechas_inicial($mes, $dia, $h_incial)
    {
        $fecha_inicio = Carbon::create(2024, array_key_first($mes), $dia, $h_incial->format('H'), $h_incial->format('i'));
        $start = $fecha_inicio->format('Y-m-d H:i');
        return $start;
    }
    public function fechas_final($mes, $dia, $h_final)
    {
        $fecha_fin = Carbon::create(2024, array_key_first($mes), $dia, $h_final->format('H'), $h_final->format('i'));
        $end = $fecha_fin->format('Y-m-d H:i');
        return $end;
    }
    public function index()
    {
        $fichas = Ficha::all();
        $all_events = Event::all();
        $events = [];

        foreach ($all_events as $event) {
            $materias = [];
            foreach ($event->mes1[array_key_first($event->mes1)] as $name => $subArray) {
                $materias[] = $name;
            }
            $ficha = Ficha::find($event->ficha_id);
            $nombre_materia = $event->mes1[array_key_first($event->mes1)];
            $materia = array_key_first($nombre_materia);
            $i = 0;
            $m1 = $event->mes1[array_key_first($event->mes1)];
            $m2 = $event->mes2[array_key_first($event->mes2)];
            $m3 = $event->mes3[array_key_first($event->mes3)];
            // dd( $event->hora[$materias[$i]],$materias[$i],$m1[$materias[$i]],$m2[$materias[$i]],$m3[$materias[$i]]);
            foreach ($materias as $materia) {
                $hora = $event->hora[$materia];
                $hora_inicial = DateTime::createFromFormat('H:i', $hora[0]);
                $hora_final = DateTime::createFromFormat('H:i', $hora[1]);
                foreach ($m1[$materia] as $v1) {
                    $start = $this->fechas_inicial($event->mes1, $v1, $hora_inicial);
                    $end = $this->fechas_final($event->mes1, $v1, $hora_final);
                    $events[] = [
                        'title' => $materia . ' F:' . (string) $ficha->noFicha,
                        'start' => $start,
                        'end' => $end
                    ];
                }
                foreach ($m2[$materia] as $v2) {
                    $start = $this->fechas_inicial($event->mes2, $v2, $hora_inicial);
                    $end = $this->fechas_final($event->mes2, $v2, $hora_final);
                    $events[] = [
                        'title' => $materia . ' F:' . (string) $ficha->noFicha,
                        'start' => $start,
                        'end' => $end
                    ];
                }
                foreach ($m3[$materia] as $v3) {
                    $start = $this->fechas_inicial($event->mes3, $v3, $hora_inicial);
                    $end = $this->fechas_final($event->mes3, $v3, $hora_final);
                    $events[] = [
                        'title' => $materia . ' F:' . (string) $ficha->noFicha,
                        'start' => $start,
                        'end' => $end
                    ];
                }
            }
        }
        return view('events.index', ['fichas' => $fichas], compact('events'));
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
        //validacion de datos
        $request->validate([
            'nombre' => 'required|string|max:250',
            'ficha_id' => 'required|exists:fichas,id',
            'fecha_inicio' => 'required|date',
            'dias' => 'required|array',
            'dias.*' => 'string|max:10',
            'hora_inicio' => 'required|string',
            'hora_final' => 'required|string'
        ]);
        //creacion de fechas por trimestre
        $fecha_inicial = Carbon::parse($request->fecha_inicio);
        $fecha_final = Carbon::parse($request->fecha_inicio)->addMonths(3);
        $trimestre = new CarbonPeriod($fecha_inicial, '1 day', $fecha_final);
        $meses = [];
        foreach ($trimestre as $date) {
            if ($date->month == 12) {
                break;
            }
            if (!in_array($date->month, array_keys($meses))) {
                $meses[$date->month] = [];
            }
            if (in_array($date->englishDayOfWeek, $request->dias)) {
                $meses[$date->month][] = $date->day;
            }
        }
        if (count($meses) == 4) {
            array_pop($meses);
        }
        if (count($meses) < 3) {
            return redirect()->route('events.index')->with('success', 'Perdon, pero la fecha introducida causa conflictos con el servido /n por favor introdusca una diferente');
        }
        $mes1 = array_keys($meses)[0];
        $mes2 = array_keys($meses)[1];
        $mes3 = array_keys($meses)[2];
        //guardado en base de datos
        $evento = Event::where('ficha_id', '=', $request->ficha_id)->first();
        //si no existe
        if (!$evento) {
            Event::create([
                'ficha_id' => $request->ficha_id,
                'mes1' => [$mes1 => [$request->nombre => $meses[$mes1]]],
                'mes2' => [$mes2 => [$request->nombre => $meses[$mes2]]],
                'mes3' => [$mes3 => [$request->nombre => $meses[$mes3]]],
                'hora' => [$request->nombre => [$request->hora_inicio, $request->hora_final]]
            ]);
            return redirect()->route('events.index')->with('success', 'El evento ' . $request->nombre . ' fue guardado con exito');
        }
        //si existe
        // habra una larga de validacion para cada mes
        // mes Nª1
        if (!array_key_exists($mes1, $evento->mes1)) {
            $mes_db = array_keys($evento->mes1);
            $dias = array_merge($evento->mes1, [$mes1 => [$request->nombre => $meses[$mes1]]]);
            array_push($mes_db, $mes1);
            $combinacion = array_combine($mes_db, $dias);
            asort($combinacion);
            $evento->mes1 = $combinacion;
        } else {
            if (array_key_exists($request->nombre, $evento->mes1[$mes1])) {
                return redirect()->route('events.index')->with('success', 'Lo siento, pero el evento ' . $request->nombre . ' ya ha sido guardado');
            }
            $evento->mes1 = [$mes1 => array_merge($evento->mes1[$mes1], [$request->nombre => $meses[$mes1]])];
        }
        // mes Nª2
        if (!array_key_exists($mes2, $evento->mes2)) {
            $mes_db = array_keys($evento->mes2);
            $dias = array_merge($evento->mes2, [$mes2 => [$request->nombre => $meses[$mes2]]]);
            array_push($mes_db, $mes2);
            $combinacion = array_combine($mes_db, $dias);
            asort($combinacion);
            $evento->mes2 = $combinacion;
        } else {
            if (array_key_exists($request->nombre, $evento->mes2[$mes2])) {
                return redirect()->route('events.index')->with('success', 'Lo siento, pero el evento ' . $request->nombre . ' ya ha sido guardado');
            }
            $evento->mes2 = [$mes2 => array_merge($evento->mes2[$mes2], [$request->nombre => $meses[$mes2]])];
        }
        // mes Nª3
        if (!array_key_exists($mes3, $evento->mes3)) {
            $mes_db = array_keys($evento->mes3);
            $dias = array_merge($evento->mes3, [$mes3 => [$request->nombre => $meses[$mes3]]]);
            array_push($mes_db, $mes3);
            $combinacion = array_combine($mes_db, $dias);
            asort($combinacion);
            $evento->mes3 = $combinacion;
        } else {
            if (array_key_exists($request->nombre, $evento->mes3[$mes3])) {
                return redirect()->route('events.index')->with('success', 'Lo siento, pero el evento ' . $request->nombre . ' ya ha sido guardado');
            }
            $evento->mes3 = [$mes3 => array_merge($evento->mes3[$mes3], [$request->nombre => $meses[$mes3]])];
        }
        // hora
        $evento->hora = array_merge($evento->hora, [$request->nombre => [$request->hora_inicio, $request->hora_final]]);
        // dd($evento->mes1,$evento->mes2,$evento->mes3);
        $evento->save();
        return redirect()->route('events.index')->with('success', 'El evento ' . $request->nombre . ' fue guardado con exito');

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
