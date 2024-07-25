<?php

namespace App\Http\Controllers;

use App\Models\instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $instructor = instructor::all();
        return view('instructores.index', ['intructor' => $instructor]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('instructores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'documento' => 'required|max:225',
            'nombre' => 'required|max:225',
            'apellido' => 'required|max:225',
            'correo' => 'required|max:225',
            'telefono' => 'required|max:225',
        ]);

        $instructor = new instructor();
        $instructor->documento=$request->input('documento');
        $instructor->nombre=$request->input('nombre');
        $instructor->apellido=$request->input('apellido');
        $instructor->correo=$request->input('correo');
        $instructor->telefono=$request->input('telefono');
        $instructor->save();
        return view('instructores.menssage',['msg'=>"Registro Guardado satisfactoriamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $instructor=instructor::find($id);
        return view('instructores.edit', ['instructor'=>$instructor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $request->validate([
            'documento' => 'required|max:225',
            'nombre' => 'required|max:225',
            'apellido' => 'required|max:225',
            'correo' => 'required|max:225',
            'telefono' => 'required|max:225',
        ]);

        $instructor = instructor::find($id);
        $instructor->documento=$request->input('documento');
        $instructor->nombre=$request->input('nombre');
        $instructor->apellido=$request->input('apellido');
        $instructor->correo=$request->input('correo');
        $instructor->telefono=$request->input('telefono');
        $instructor->save();
        return view('instructores.menssage',['msg'=>"Registro editado satisfactoriamente"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        instructor::destroy($id);
        return redirect('instructores');
    }
}
