<?php

namespace App\Http\Controllers;

use App\Models\Asistencias;
use App\Models\Aprendiz;
use App\Models\Event;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{
    public function index()
    {
        $asistencias = Asistencias::with(['aprendiz', 'event'])->get();
        return view('asistencias.index', compact('asistencias'));
    }

    public function create()
    {
        $aprendices = Aprendiz::all();
        $events = Event::all(); // Carga todos los eventos
        return view('asistencias.create', compact('aprendices', 'events'));
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
    $request->validate([
        'asistencias.*.id_aprendiz' => 'required|exists:aprendizs,id',
        'asistencias.*.id_event' => 'required|exists:events,id',
        'asistencias.*.datos_asistencia' => 'required|array',
        'asistencias.*.datos_asistencia.asistio' => 'boolean',
        'asistencias.*.datos_asistencia.no_asistio' => 'boolean',
        'asistencias.*.datos_asistencia.excusa' => 'nullable|string',
    ]);

    foreach ($request->input('asistencias') as $asistenciaData) {
        // dd($asistenciaData);
        Asistencias::updateOrCreate(
            [
                'id_aprendiz' => $asistenciaData['id_aprendiz'],
                'id_event' => $asistenciaData['id_event']
            ],
            [
                'datos_asistencia' => $asistenciaData['datos_asistencia'],
            ]
        );
    }

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
