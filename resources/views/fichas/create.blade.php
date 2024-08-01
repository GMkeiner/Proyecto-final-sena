@extends('layouts.app')

@section('content')

    <div class="container py-4">
        <h2>Registrar Ficha</h2>

        <form action="{{ route('fichas.store') }}" method="post">

            @csrf
            <div class="md-3 row">
                <div class="col-sm-5">
                    <label for="nombre" class="col-sm-4 col-form-label">Numero de ficha:</label>
                    <input type="text" class="form-control"  name="noFicha"  id="noFicha" value="{{old('noFicha')}}" required>
                </div>
                <div class="col-sm-5">
                    <label for="instructor_id" class="col-sm-2 col-form-label">Instructor:</label>
                    <select name="instructor_id" class="form-select form-select-sm" >
                        <option selected disabled>Selecciona...</option>
                        @foreach ($instructores as $instructor)
                            <option value="{{$instructor->id}}">{{$instructor->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            <a href="{{ route('fichas.index') }}"  class="btn btn-secondary">Regresar</a>
            <button type="sumit" class="btn btn-success">Guardar</button>
            </div>
    </form>
    </div>

@endsection
