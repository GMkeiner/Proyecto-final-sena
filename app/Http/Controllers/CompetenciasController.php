<?php

namespace App\Http\Controllers;

use App\Models\competencia;
use App\Models\Instructores;
use Illuminate\Http\Request;

class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competencia= competencia::with('instructor')->get();
        return view('competencias.index', ['competencia'=>$competencia]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('competencias.create',['instructores'=>Instructores::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre'=>'required|max:255',
            'instructor_id'=>'required|integer|exists:instructors,id',
        ]);
        Competencia::insert([
            'nombre' => $request->nombre,
            'instructor_id' => $request->instructor_id
        ]);

        return redirect()->route('competencias.index')->with('success','competencia creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(competencia $competencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competencia $competencia)
    {
        return view('competencias.edit', ['competencia'=>$competencia,'instructores'=>Instructores::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, Competencia $competencia)
    {
        $request->validate([
            'nombre'=>'required|max:255',
            'instructor_id'=>'required|integer|exists:instructors,id',
        ]);
        $competencia->update([
            'nombre' => $request->nombre,
            'instructor_id' => $request->instructor_id
        ]);
        return redirect()->route('competencias.index')->with('success','competencia actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Competencia $competencia)
    {
        $competencia->delete();
        return redirect()->route('competencias.index')->with('danger','competencia eliminada exitosamente');
    }
}
