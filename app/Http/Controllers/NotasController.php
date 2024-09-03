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
        $instructor = Instructores::where('user_id', '=', Auth::user()->id)->with(['ficha','competencia'])->first();
        return view('notas.index', ['fichas' => $instructor->ficha, 'fichasPersonales' => $instructor]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate(['ficha_id' => 'required|integer|min:1']);
        $aprendices = Ficha::where('id', '=', $request->ficha_id)->with(['aprendices'])->first();
        $competencias = Instructores::where('user_id', '=', Auth::user()->id)->with('competencia')->first()->competencia;
        return view('notas.create', ['aprendices' => $aprendices->aprendices, 'ficha' => $aprendices->id, 'competencias' => $competencias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_ficha' => 'required|integer',
            'competencia' => 'required|integer',
            'nombreAprendiz' => 'required|array',
            'nota1' => 'required|array',
            'nota2' => 'required|array',
            'nota3' => 'required|array'
        ]);
        
        foreach ($request->nombreAprendiz as $clave => $nombre) {
            $promedios[$clave] = round(($request->nota1[$clave] + $request->nota2[$clave] + $request->nota3[$clave]) / 3, 2);
            $array[] = ['nombre' => $request->nombreAprendiz[$clave], 'nota1' => $request->nota1[$clave], 'nota2' => $request->nota2[$clave], 'nota3' => $request->nota3[$clave], 'definitiva' => $promedios[$clave]];
        }
        $nombreInstructor = Instructores::where('user_id', '=', Auth::user()->id)->first();
        $ficha = Ficha::find($request->id_ficha);
        // dd($request, $nombreInstructor, $array);
        $ficha->competencia()->attach($request->competencia,['notas'=>$array]);
        return redirect()->route('notas.index')->with('success', 'Notas guardadas exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ficha $fichas)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ficha $fichas, $competencia)
    {
        $notas = $fichas->competencia->where('id', '=', $competencia)->first()->notas;
        return view('notas.edit')->with(['ficha'=>$notas->ficha_id,'competencia'=>$notas->competencia_id,'notas' => $notas->notas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ficha $fichas, $competen)
    {
        $request->validate([
            'nombreAprendiz' => 'required|array',
            'nota1' => 'required|array',
            'nota2' => 'required|array',
            'nota3' => 'required|array'
        ]);
        foreach ($request->nombreAprendiz as $clave => $nombre) {
            $promedios[$clave] = round(($request->nota1[$clave] + $request->nota2[$clave] + $request->nota3[$clave]) / 3, 2);
            $array[] = ['nombre' => $request->nombreAprendiz[$clave], 'nota1' => $request->nota1[$clave], 'nota2' => $request->nota2[$clave], 'nota3' => $request->nota3[$clave], 'definitiva' => $promedios[$clave]];
        }
        $competencia = $fichas->competencia->where('id','=',$competen)->first();
        $competencia->notas->update(['notas' => $array]);
        return redirect()->route('notas.index')->with('success', 'Notas actualizadas exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ficha $fichas, $competencia)
    {
        // $fichas->notas->where('id','=',$request->id_competencia)->first()->notas->update(['notas'=>null]);
        $fichas->competencia()->detach($competencia);
        return redirect()->route('notas.index')->with('danger', 'Notas eliminadas exitosamente');
    }
}
