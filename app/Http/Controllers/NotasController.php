<?php

namespace App\Http\Controllers;

// use App\Models\Nota;
use App\Models\Ficha;
use App\Models\Instructores;
use Auth;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructor = Instructores::where('user_id','=',Auth::user()->id)->with('ficha.notas')->first();
        return view('notas.index',['fichas'=>Ficha::all(),'fichasPersonales'=>$instructor]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(['ficha_id'=> 'required|integer|min:1']);
        $aprendices=Ficha::where('id','=',$request->ficha_id)->with(['aprendices','notas'])->first();
        return view('notas.create',['aprendices'=> $aprendices->aprendices,'ficha'=>$aprendices->id,'competencias'=>$aprendices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ficha' => 'required|integer',
            'instructor' => 'required|integer',
            'competencia' => 'required|integer',
            'nombreAprendiz' => 'required|array',
            'nota1' => 'required|array',
            'nota2' => 'required|array',
            'nota3' => 'required|array'
        ]);

        foreach($request->nombreAprendiz as $clave => $nombre){
            $promedios[$clave] = round(($request->nota1[$clave]+$request->nota2[$clave]+$request->nota3[$clave])/3,2);
            $array[] = ['nombre'=>$request->nombreAprendiz[$clave],'nota1'=>$request->nota1[$clave],'nota2'=>$request->nota2[$clave],'nota3'=>$request->nota3[$clave],'definitiva'=>$promedios[$clave]];
        }
        $nombreInstructor = Instructores::where('user_id','=',$request->instructor)->first();
        $notas = Ficha::where('id','=',$request->id_ficha)->with('notas')->first()->notas->where('id','=',$request->competencia)->first()->notas;
        // $competencia=$competencias->where('id','=',$request->competencia)->first();
        // dd($request,$notas,['Instructor'=>$nombreInstructor->nombre.' '.$nombreInstructor->apellido,'notas'=>$array]);
        $notas->update(['notas'=>['Instructor'=>$nombreInstructor->nombre.' '.$nombreInstructor->apellido,'notas'=>$array]]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(nota $nota)
    {
        //
    }
}
