<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Instructores;
use App\Models\Competencia;
use Illuminate\Http\Request;

class FichasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fichas = Ficha::with(['instructor'])->get();
        $instructores = Instructores::all(['id', 'nombre', 'apellido']);

        return view('fichas.index', ['ficha' => $fichas, 'instructores' => $instructores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $competencias = Competencia::all();
        return view('fichas.create', ['instructores' => Instructores::all(), 'competencias' => $competencias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'noFicha' => 'required|max:255',
            'instructor_id' => 'required|integer|exists:instructors,id',
        ]);
        $ficha = Ficha::create(['noFicha' => $request->noFicha]);
        $ficha->instructor()->attach($request->instructor_id);

        return redirect()->route('fichas.index')->with('success', 'Ficha creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ficha $ficha)
    {

        // dd($ficha->event);
        return \json_encode(['eventos' => $ficha->event, 'aprendices' => $ficha->aprendices]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ficha $ficha)
    {
        return view('fichas.edit', ['ficha' => $ficha]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ficha $ficha)
    {


        $request->validate([
            'noFicha' => 'required|max:255',
        ]);
        $ficha->update(['noFicha' => $request->noFicha]);

        return redirect()->route('fichas.index')->with('success', 'Ficha actualizada exitosamente.');
    }

    public function updateInstructor(Request $request, $id)
    {
        $request->validate([
            'instructor_id' => 'required|integer'
        ]);
        $ficha = Ficha::find($id);
        $ficha->instructor()->attach($request->instructor_id);
        return redirect()->route('fichas.index')->with('success', 'Instructor vinculado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ficha $ficha)
    {
        $ficha->instructor()->detach();
        // Para cuando se pida borrar las notas
        $ficha->competencia()->detach();
        $ficha->delete();
        return redirect()->route('fichas.index')->with('danger', 'Ficha eliminada exitosamente.');
    }
}
