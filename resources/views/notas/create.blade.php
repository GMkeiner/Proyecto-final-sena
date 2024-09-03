@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{asset('assets/img/logo.png')}}" alt="Logo SENA" class="logo">
    <h1>Formulario de Notas - SENA </h1>
    <form action="{{route('notas.store')}}" method="post">
            @csrf
            <input type="hidden" name="id_ficha" value="{{$ficha}}">
            {{-- <input type="hidden" name="instructor" value="{{Auth::user()->id}}"> --}}
            <div class="row">
                <label for="" class="form-label">Competencias</label>
                <select name="competencia" required>
                    <option selected value="">Seleccione</option>
                    @foreach ($competencias as $competencia)
                        <option value="{{$competencia->id}}">{{$competencia->nombre}}</option>
                    @endforeach
                </select>
                @error('competencia')
                    {{$message}}
                @enderror
            </div>
            @foreach ($aprendices as $aprendiz)
            <div class="form-row ">
                <div class="form-group">
                    <label for="nombreAprendiz">Nombre Aprendiz:</label>
                    <input type="text" id="nombreAprendiz" name="nombreAprendiz[{{$loop->iteration}}]" value="{{$aprendiz->nombre}}" required readonly>
                </div>
                <div class="form-group">
                    <label for="nota1">Nota 1:</label>
                    <input type="number" id="nota1" name="nota1[{{$loop->iteration}}]" min="0" max="5" step="0.1" required>
                </div>
                <div class="form-group">
                    <label for="nota2">Nota 2:</label>
                    <input type="number" id="nota2" name="nota2[{{$loop->iteration}}]" min="0" max="5" step="0.1" required>
                </div>
                <div class="form-group">
                    <label for="nota3">Nota 3:</label>
                    <input type="number" id="nota3" name="nota3[{{$loop->iteration}}]" min="0" max="5" step="0.1" required>
                </div>
                {{-- <div class="form-group">
                    <label for="definitiva">Definitiva:</label>
                    <input type="text" id="definitiva[]" name="definitiva" readonly>
                </div> --}}
            </div>
            @endforeach
        
        <button type="submit" class="btn btn-primary btn-sm col-2">Calcular Definitiva</button>
    </form>
@endsection
