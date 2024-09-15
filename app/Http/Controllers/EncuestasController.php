<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\Encuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $validated = $request->validate([
            'aprendiz_id' => 'required|exists:aprendizs,user_id',
            'respuesta1' => 'required|integer|between:1,5',
            'respuesta2' => 'required|integer|between:1,5',
            'respuesta3' => 'required|integer|between:1,5',
            'respuesta4' => 'required|integer|between:1,5',
            'respuesta5' => 'required|integer|between:1,5',
            'respuesta6' => 'required|integer|between:1,5',
            'respuesta7' => 'required|integer|between:1,5',
        ]);
        // Busqueda del aprendiz para validar que exista y que ya hizo la encuesta.
        $aprendiz = Aprendiz::where('user_id','=',$validated['aprendiz_id'])->first();
        if(!$aprendiz or $aprendiz->user_id != Auth::user()->id){
            return redirect()->route('encuesta.index')->with('alert', 'No vuelvas a cambiar el codigo 😠.');
        }
        if(Encuesta::where('aprendiz_id','=',$aprendiz->id)->first()){
            return redirect()->route('encuesta.index')->with('alert', 'No se puede realizar la encuesta 2 veces');
        }
        // Guardar los datos en la base de datos
        Encuesta::create([
            'aprendiz_id' => $aprendiz->id,  
            'respuesta1' => $validated['respuesta1'],
            'respuesta2' => $validated['respuesta2'],
            'respuesta3' => $validated['respuesta3'],
            'respuesta4' => $validated['respuesta4'],
            'respuesta5' => $validated['respuesta5'],
            'respuesta6' => $validated['respuesta6'],
            'respuesta7' => $validated['respuesta7'],
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('encuesta.index')->with('alert', 'Encuesta guardada con éxito.');
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
