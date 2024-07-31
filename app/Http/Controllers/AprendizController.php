<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\Ficha;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class AprendizController
 * @package App\Http\Controllers
 */
class AprendizController extends Controller
{
    private $firebase;
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

        return view('aprendiz.create', ['ficha'=>ficha::all()]);

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

        $userAprendiz = User::create([
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => Hash::make($request->documento)
        ]);
        $userAprendiz->assignRole(3);
        $userAprendiz->save();

        Aprendiz::create([
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'ficha_id' => $request->ficha_id,
            'user_id' => $userAprendiz->id
        ])->save();

        return view("aprendiz.show", ['msg'=>'De forma gratificante se a agregado el aprendiz']);


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
    public function update(Request $request,$id)
    {
        $request->validate([
            'documento'=>'required|max:225',
            'nombre'=>'required|max:225',
            'apellido'=>'required|max:225',
            'correo'=>'required|max:225',
            'telefono'=>'required|max:225',
            'ficha_id'=>'required',
        ]);

        $aprendiz= Aprendiz::find($id);
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

        return view("aprendiz.show", ['msg'=>"Se a actualizado"]);
    }

    public function destroy($id)
    {
        Aprendiz::destroy($id);
        return redirect('aprendiz');
    }
}
