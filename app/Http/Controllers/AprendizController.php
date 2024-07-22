<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Http\Requests\AprendizRequest;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

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

     public $database;
     public function __construct(){
        $this->database = \App\Services\FirebaseService::connect();
    }

     public function index()
     {
         $aprendizs = Aprendiz::paginate();

         return view('aprendiz.index', compact('aprendizs'))
             ->with('i', (request()->input('page', 1) - 1) * $aprendizs->perPage());
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $aprendiz = new Aprendiz();
        return view('aprendiz.create', compact('aprendiz'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
=======
        print($request);
        // Aprendiz::create($request->validated());
>>>>>>> f02d3c3fa59a67208d9c91dfb9d10198588da14f

        $data =[
            'nombre' => $request->nombre_completo,
            'documento'=> $request->documento,
            'pregunta1'=> $request->pregunta1,
            'pregunta2'=> $request->pregunta2,
            'pregunta3'=> $request->pregunta3,
            'pregunta4'=> $request->pregunta4,
            'pregunta5'=> $request->pregunta5,
            'pregunta6'=> $request->pregunta6,
            'pregunta7'=> $request->pregunta7
        ];

        $this->database
        ->getReference('Encuestas')
        ->push($data);

                return redirect()->route('aprendiz.index')
                ->with('success', 'Aprendiz created successfully.');




    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aprendiz = Aprendiz::find($id);

        return view('aprendiz.show', compact('aprendiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aprendiz = Aprendiz::find($id);

        return view('aprendiz.edit', compact('aprendiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AprendizRequest $request, Aprendiz $aprendiz)
    {
        $aprendiz->update($request->validated());

        return redirect()->route('aprendiz.index')
            ->with('success', 'Aprendiz actualizado exitosamente');
    }

    public function destroy($id)
    {
        Aprendiz::find($id)->delete();

        return redirect()->route('aprendiz.index')
            ->with('success', 'Aprendiz eliminado exitosamente');
    }
}
