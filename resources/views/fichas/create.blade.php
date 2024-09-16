@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-1">
        <h2>Registrar Ficha</h2>

        <form action="{{ route('fichas.store') }}" method="post">

            @csrf
            <div class="p-3 row">
                <div class="col-sm-5">
                    <label for="nombre" class="col-sm-4 col-form-label">Numero de ficha:</label>
                    <input type="text" class="form-control" name="noFicha" id="noFicha" value="{{ old('noFicha') }}"
                        required>
                </div>
                <div class="col-sm-5">
                    <label for="instructor_id" class="col-sm-2 col-form-label">Instructor:</label>
                    <select name="instructor_id" class="form-select form-select" required>
                        <option selected disabled value="">Selecciona...</option>
                        @foreach ($instructores as $instructor)
                            <option value="{{ $instructor->id }}">{{ $instructor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row my-3 mx-1">
                    <a href="{{ route('fichas.index') }}" class="btn btn-secondary col-2 me-1">Regresar</a>
                    <button type="sumit" class="btn btn-success col-2">Guardar</button>
                </div>

            </div>
        </form>
    </div>
@endsection
