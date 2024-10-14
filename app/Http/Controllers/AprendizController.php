<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\Ficha;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// YA TODO FUNCIONA AL 100%

/**
 * Class AprendizController
 * @package App\Http\Controllers
 */
class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $aprendiz=Aprendiz::all();
        return view('aprendiz.index', ['aprendiz' => $aprendiz]);

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('aprendiz.create', ['ficha'=>Ficha::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'documento'=>'required|max:225',
            'nombre'=>'required|max:225',
            'apellido'=>'required|max:225',
            'correo'=>'required|max:225',
            'telefono'=>'required|max:225',
            'ficha_id'=>'required',
        ]);
        // dd($request);
        $userAprendiz = User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => Hash::make($request->documento)
        ]);
        $userAprendiz->assignRole(3);
        $userAprendiz->save();

        Aprendiz::insert([
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'ficha_id' => $request->ficha_id,
            'user_id' => $userAprendiz->id
        ]);

        return redirect()->route('aprendiz.index')->with('success', 'Aprendiz registrado exitosamente');


    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aprendiz = Aprendiz::find($id);

        return view('aprendiz.edit',['aprendiz'=>$aprendiz, 'ficha'=>ficha::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aprendiz $aprendiz)
    {
        $request->validate([
            'documento'=>'required|max:225',
            'nombre'=>'required|max:225',
            'apellido'=>'required|max:225',
            'correo'=>'required|max:225|unique:users,email',
            'telefono'=>'required|max:225',
            'ficha_id'=>'required',
        ]);
        // dd($aprendiz);
        $aprendiz->update([
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'ficha_id' => $request->ficha_id
        ]);
        if($aprendiz->wasChanged('nombre')){
            User::find($aprendiz->user_id)->update([ 'name'=> $aprendiz->nombre]);
        }

        return redirect()->route('aprendiz.index')->with('success', 'Aprendiz actualizado exitosamente');
    }

    public function destroy(Aprendiz $aprendiz)
    {
        $aprendiz->delete();
        return redirect()->route('aprendiz.index')->with('danger', 'Aprendiz eliminado exitosamente');
    }
}
