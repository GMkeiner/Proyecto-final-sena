<?php

namespace App\Http\Controllers;

use App\Models\Asistencias;
use App\Models\Aprendiz;
use App\Models\Event;
use App\Models\Ficha;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{
    public function index()
    {
        $asistencias = Asistencias::with(['ficha.aprendices'])->get();
        return view('asistencias.index', ['asistencias' => $asistencias]);
    }

    public function create()
    {
        $ficha = Ficha::all(['id', 'noFicha']);
        return view('asistencias.create', ['fichas' => $ficha]);
    }


    public function edit(Asistencias $asistencia)
    {
        $events = Event::where('ficha_id', '=', $asistencia->ficha_id)->first();
        $meses = array_merge(array_keys($events["mes1"]), array_keys($events["mes2"]), array_keys($events["mes3"]));
        sort($meses);
        foreach ([$events["mes1"], $events["mes2"], $events["mes3"]] as $meses_eventos) {
            if (array_key_exists($asistencia->evento[1], $meses_eventos) and array_key_exists($asistencia->evento[0], $meses_eventos[$asistencia->evento[1]])) {
                $clases = array_keys($meses_eventos[$asistencia->evento[1]]);
                $dias = $meses_eventos[$asistencia->evento[1]][$asistencia->evento[0]];
            }
        }
        $aprendices = Ficha::where('id','=',$asistencia->ficha_id)->first()->aprendices;
        // dd($asistencia, $events, $meses, $clases, $dias);

        return view('asistencias.edit', ['fichas'=>Ficha::all(['id', 'noFicha']),'asistencia' => $asistencia, 'meses' => $meses, 'clases' => $clases, 'dias' => $dias,'aprendices'=>$aprendices]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_ficha' => 'required|integer|exists:fichas,id',
            'mes' => 'required|integer|between:1,11',
            'nombre' => 'required|string|max:200',
            'dia' => 'required|integer|between:1,31',
            'hora_inicial' => 'required|string|max:7',
            'hora_final' => 'required|string|max:7',
            'asistencias.*.id_aprendiz' => 'required|exists:aprendizs,id',
            'asistencias.*.datos_asistencia' => 'required|array',
            'asistencias.*.datos_asistencia.asistio' => 'boolean',
            'asistencias.*.datos_asistencia.no_asistio' => 'boolean',
            'asistencias.*.datos_asistencia.excusa' => 'nullable|string',
        ]);

        foreach ($request->asistencias as $asistenciaData) {
            // dd($asistenciaData);
            if (array_key_exists('no_asistio', $asistenciaData['datos_asistencia'])) {
                $no_asistieron[] = $asistenciaData;
            } else {
                $asistieron[] = $asistenciaData;
            }
        }
        // dd($no_asistieron, $asistieron);
        Asistencias::Create([
            'ficha_id' => $request->id_ficha,
            'asistieron' => $asistieron,
            'no_asistieron' => $no_asistieron,
            'evento' => [$request->nombre, $request->mes, $request->dia, $request->hora_inicial, $request->hora_final],
        ]);


        return redirect()->route('asistencias.index')->with('success', 'Asistencias registradas exitosamente.');
    }


    public function update(Request $request, Asistencias $asistencia)
    {
        // dd($request);
        $request->validate([
            'id_ficha' => 'required|integer|exists:fichas,id',
            'mes' => 'required|integer|between:1,11',
            'nombre' => 'required|string|max:200',
            'dia' => 'required|integer|between:1,31',
            'hora_inicial' => 'required|string|max:7',
            'hora_final' => 'required|string|max:7',
            'asistencias.*.id_aprendiz' => 'required|exists:aprendizs,id',
            'asistencias.*.datos_asistencia' => 'required|array',
            'asistencias.*.datos_asistencia.asistio' => 'boolean',
            'asistencias.*.datos_asistencia.no_asistio' => 'boolean',
            'asistencias.*.datos_asistencia.excusa' => 'nullable|string',
        ]);

        foreach ($request->asistencias as $asistenciaData) {
            // dd($asistenciaData);
            if (array_key_exists('no_asistio', $asistenciaData['datos_asistencia'])) {
                $no_asistieron[] = $asistenciaData;
            } else {
                $asistieron[] = $asistenciaData;
            }
        }

        $asistencia->update([
            'ficha_id' => $request->id_ficha,
            'asistieron' => $asistieron,
            'no_asistieron' => $no_asistieron,
            'evento' => [$request->nombre, $request->mes, $request->dia, $request->hora_inicial, $request->hora_final],
        ]);

        return redirect()->route('asistencias.index')->with('success', 'Asistencias actualizadas exitosamente.');
    }


    public function destroy(Asistencias $asistencia)
    {
        $asistencia->delete();
        return redirect()->route('asistencias.index')->with('success', 'Asistencia eliminada exitosamente.');
    }
}
