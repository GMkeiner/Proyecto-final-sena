<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Illuminate\Http\Request;

class FichasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ficha=Ficha::all();
        return view('fichas.index',['ficha'=>$ficha]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('fichas.create',['fichas'=>Ficha::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'noFicha'=> 'required|max:255',
        ]);

        Ficha::insert(['noFicha'=>$request->noFicha]);

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Ficha::destroy($id);
        return redirect('fichas');
    }
}
