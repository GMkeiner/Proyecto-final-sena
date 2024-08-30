@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2>Actualizar Ficha</h2>

        <form action="{{ url('fichas/' . $ficha->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="md-3 row">
                <label for="noFicha" class="col-sm-2 col-form-label">Nombre de la ficha:</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="noFicha" id="noFicha" value="{{ $ficha->noFicha }}"
                        required>
                </div>


            </div>
            <div class="row m-2">
                <a href="{{ url('fichas') }}" class="btn btn-secondary col-2 me-1">Regresar</a>
                <button type="sumit" class="btn btn-success col-2 " >Guardar</button>
            </div>
        </form>
    </div>
@endsection
