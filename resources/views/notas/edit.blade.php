@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo SENA" class="logo">
        <h1>Formulario de Notas - SENA</h1>
        <form action="{{ route('notas.competencias.update', [$ficha, $competencia]) }}" method="post">
            @csrf
            @method('PATCH')
            @foreach ($notas as $aprendiz)
                <div class="form-row my-2">
                    <div class="form-group">
                        <label for="nombreAprendiz">Nombre Aprendiz:</label>
                        <input type="text" id="nombreAprendiz" name="nombreAprendiz[{{ $loop->iteration }}]"
                            value="{{ $aprendiz->nombre }}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="nota1">Nota 1:</label>
                        <input type="number" id="nota1" name="nota1[{{ $loop->iteration }}]"
                            value="{{ $aprendiz->nota1 }}" min="0" max="5" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="nota2">Nota 2:</label>
                        <input type="number" id="nota2" name="nota2[{{ $loop->iteration }}]"
                            value="{{ $aprendiz->nota2 }}" min="0" max="5" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="nota3">Nota 3:</label>
                        <input type="number" id="nota3" name="nota3[{{ $loop->iteration }}]"
                            value="{{ $aprendiz->nota3 }}" min="0" max="5" step="0.1" required>
                    </div>
                    <div class="form-group">
                        <label for="nota3">Definitiva actual:</label>
                        <input type="number" min="0" max="5" step="0.1" required disabled readonly
                            value="{{ $aprendiz->definitiva }}">
                    </div>
                </div>
            @endforeach
            <a type="button" class="btn btn-secondary btn-sm col-1 mt-2" href="{{ route('notas.index') }}">Regresar</a>
            <button type="submit" class="btn btn-primary btn-sm col-2 mt-2">Actualizar notas</button>
            <button type="submit" class="btn btn-danger btn-sm col-2 mt-2"
                onclick="event.preventDefault(); if(window.confirm('Seguro que quiere borrar estas notas?')){document.getElementById('delete_notas').submit();}">Eliminar
                notas</button>
        </form>
        <form action="{{ route('notas.competencias.destroy', [$ficha, $competencia]) }}" method="post" id="delete_notas">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
