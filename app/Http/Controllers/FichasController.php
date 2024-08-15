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
        $fichas=Ficha::with(['instructor','notas'])->get();
        $instructores = Instructores::all(['id','nombre','apellido']);
        
        return view('fichas.index',['ficha'=>$fichas,'instructores'=>$instructores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $competencias = Competencia::all();
        return view('fichas.create',['instructores'=>Instructores::all(),'competencias'=>$competencias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'noFicha'=> 'required|max:255',
            'instructor_id' => 'required|integer',
            'id_competencia' => 'required|integer|min:1'
        ]);

        $ficha = Ficha::create(['noFicha'=>$request->noFicha]);
        $ficha->instructor()->attach($request->instructor_id);
        $ficha->notas()->attach($request->id_competencia);

        return view("fichas.message",['msg'=>"Con total perfeccion se ha agregado una ficha"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ficha $ficha)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $ficha=Ficha::find($id);
        return view('fichas.edit', ['ficha'=>$ficha]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
        'noFicha'=>'required|max:255',
        ]);

        $ficha= Ficha::find($id);
        $ficha->update(['noFicha'=>$request->noFicha]);

        return view("fichas.message", ['msg'=>"Se ha registrado la actualizacion"]);
    }

    public function updateInstructor(Request $request,$id){
        $request->validate([
            'instructor_id' => 'required|integer'
        ]);
        $ficha = Ficha::find($id);
        $ficha->instructor()->attach($request->instructor_id);
        return redirect('fichas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $ficha=Ficha::find($id);
        $ficha->instructor()->detach();
        $ficha->delete();
        return redirect('fichas');
    }
}
