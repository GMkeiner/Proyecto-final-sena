@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-1">
        <h2>Actualizar competencia</h2>
        <form action="{{ route('competencias.update',$competencia->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="md-3 row">
                <div class="col-sm-6">
                    <label for="nombre" class="col-sm-4 form-label">Nombre de la competencia:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $competencia->nombre }}"
                        required>
                </div>
                <div class="col-sm-3">
                    <label for="nombre" class="col-sm-3 form-label">Instructor:</label>
                    <select name="instructor_id" required class="form-select">
                        <option disabled> Seleccione una opción ... </option>
                        @foreach ($instructores as $instructor)
                            <option value="{{ $instructor->id }}"
                                @if ($instructor->id == $competencia->instructor_id) @selected(true) @endif>
                                {{ $instructor->nombre . ' ' . $instructor->apellido }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-3 mt-3">
                    <a href="{{ route('competencias.index') }}" class="btn btn-secondary">Regresar</a>
                    <button type="sumit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>

    </div>
@endsection
