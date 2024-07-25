<?php

namespace App\Http\Controllers;

use App\Models\competencia;
use Illuminate\Http\Request;

class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $competencia= competencia::all();
        return view('competencias.index', ['competencia'=>$competencia]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('competencias.create',['competencia'=>competencia::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre'=>'required|max:255',
        ]);

        $competencia= new competencia();
        $competencia->nombre=$request->input('nombre');
        $competencia->save();

        return view("competencias.message",['msg'=>"Se ha registrado la competencia de forma exitosa"]);
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
    public function edit($id)
    {
        //
        $competencia=competencia::find($id);    
        return view('competencias.edit', ['competencia'=>$competencia]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request,$id)
    {
        //
        $request->validate([
            'nombre'=>'required|max:255',
        ]);

        $competencia= competencia::find($id);
        $competencia->nombre=$request->input('nombre');
        $competencia->save();

        return view("competencias.message",['msg'=>"Se ha actualizado la competencia de forma exitosa"]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        competencia::destroy($id);
        return redirect('Competencia');
    }
}
