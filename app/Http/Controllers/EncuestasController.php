<?php

namespace App\Http\Controllers;

use App\Models\encuesta;
use Illuminate\Http\Request;

class EncuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $encuesta = Encuesta::all();
        return view('encuesta.index', compact('encuesta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'aprendiz_id' => 'required|exists:users,id', // Ensure this is validated properly
            'respuesta1' => 'required|integer|between:1,5',
            'respuesta2' => 'required|integer|between:1,5',
            'respuesta3' => 'required|integer|between:1,5',
            'respuesta4' => 'required|integer|between:1,5',
            'respuesta5' => 'required|integer|between:1,5',
            'respuesta6' => 'required|integer|between:1,5',
            'respuesta7' => 'required|integer|between:1,5',
        ]);

        // Guardar los datos en la base de datos
        Encuesta::create($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('encuesta.index')->with('success', 'Encuesta guardada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(encuesta $encuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(encuesta $encuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, encuesta $encuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(encuesta $encuesta)
    {
        //
    }
}
