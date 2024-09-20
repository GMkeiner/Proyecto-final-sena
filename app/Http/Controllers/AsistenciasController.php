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
        return view('asistencias.index', ['asistencias'=>$asistencias]);
    }

    public function create()
    {
        $ficha = Ficha::all(['id','noFicha']);
        return view('asistencias.create',['fichas'=>$ficha]);
    }

    
public function edit($id)
{
    $asistencia = Asistencias::findOrFail($id); // Obtener la asistencia por ID
    $aprendices = Aprendiz::all(); // Obtener todos los aprendices
    $events = Event::all(); // Obtener todos los eventos

    return view('asistencias.edit', compact('asistencia', 'aprendices', 'events'));
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
        if(array_key_exists('no_asistio',$asistenciaData['datos_asistencia'])){
            $no_asistieron[] = $asistenciaData;
        }else{
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
    $request->validate([
        'asistencias.*.id_aprendiz' => 'required|exists:aprendizs,id',
        'asistencias.*.id_event' => 'required|exists:events,id',
        'asistencias.*.datos_asistencia' => 'required|array',
        'asistencias.*.datos_asistencia.asistio' => 'boolean',
        'asistencias.*.datos_asistencia.no_asistio' => 'boolean',
        'asistencias.*.datos_asistencia.excusa' => 'nullable|string',
    ]);

    foreach ($request->input('asistencias') as $asistenciaData) {
        $asistencia->update([
            'id_aprendiz' => $asistenciaData['id_aprendiz'],
            'id_event' => $asistenciaData['id_event'],
            'datos_asistencia' => $asistenciaData['datos_asistencia'],
        ]);
    }

    return redirect()->route('asistencias.index')->with('success', 'Asistencias actualizadas exitosamente.');
}

        
    public function destroy(Asistencias $asistencia)
    {
        $asistencia->delete();
        return redirect()->route('asistencias.index')->with('success', 'Asistencia eliminada exitosamente.');
    }
}
