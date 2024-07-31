<?php

namespace App\Http\Controllers;

use App\Models\Instructores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $instructor = Instructores::all();
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

        $userProfesor = User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => Hash::make($request->documento
        )]);
        $userProfesor->assignRole(2);

        Instructores::insert([
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'user_id' => $userProfesor->id
        ]);
        return view('instructores.menssage',['msg'=>"Registro Guardado satisfactoriamente"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructores $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $instructor=Instructores::find($id);
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

        $instructor = Instructores::find($id);
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
        Instructores::destroy($id);
        return redirect('instructores');
    }
}
