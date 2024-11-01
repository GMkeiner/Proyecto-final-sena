@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-1">
        <h2>Actualizar Intructor</h2>

        <form action="{{ url('instructores/' . $instructor->id) }}" method="post">
            @method('PUT')
            @csrf

            <div class="my-3 row">
                <label for="documento" class="col-sm-2 col-form-label">Documento del Intructor:</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="documento" id="documento"
                        value="{{ $instructor->documento }}" required>
                </div>
            </div>
            <div class="my-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre del Intructor:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre"
                        value="{{ $instructor->nombre }}" required>
                </div>
            </div>
            <div class="my-3 row">
                <label for="apellido" class="col-sm-2 col-form-label">Apellido del Intructor:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="apellido" id="apellido"
                        value="{{ $instructor->apellido }}" required>
                </div>
            </div>
            <div class="my-3 row">
                <label for="correo" class="col-sm-2 col-form-label">Correo del Intructor:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="correo" id="correo"
                        value="{{ $instructor->correo }}" required>
                </div>
            </div>
            <div class="my-3 row">
                <label for="telefono" class="col-sm-2 col-form-label">Telefono del Intructor:</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="telefono" id="telefono"
                        value="{{ $instructor->telefono }}" required>
                </div>
            </div>
            <a href="{{ url('instructores') }}" class="btn btn-secondary col-1  mx-2">Regresar</a>
            <button type="sumit" class="btn btn-success col-1  mx-2">Guardar</button>
    </div>
    </form>
    </div>
@endsection
