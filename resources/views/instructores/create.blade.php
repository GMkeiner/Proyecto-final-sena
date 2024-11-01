@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-1">
        <h2>Registrar Instructor</h2>

        <form action="{{ route('instructores.index') }}" method="post">

            @csrf
            <div class="my-3 row">
                <label for="documento" class="col-sm-2 col-form-label">Documento del profesor:</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="documento" id="documento" value="{{ old('documento') }}"
                        required>
                </div>
            </div>
            @error('documento')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="my-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre del profesor:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}"
                        required>
                </div>
            </div>
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="my-3 row">
                <label for="apellido" class="col-sm-2 col-form-label">Apellido del profesor:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="apellido" id="apellido" value="{{ old('apellido') }}"
                        required>
                </div>
            </div>
            @error('apellido')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="my-3 row">
                <label for="correo" class="col-sm-2 col-form-label">Correo del profesor:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="correo" id="correo" value="{{ old('correo') }}"
                        required>
                </div>
            </div>
            @error('correo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="my-3 row">
                <label for="telefono" class="col-sm-2 col-form-label">Telefono del profesor:</label>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="telefono" id="telefono" value="{{ old('telefono') }}"
                        required>
                </div>
            </div>
            @error('telefono')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="my-3 row">
                <a href="{{ url('instructores') }}" class="btn btn-secondary col-1  mx-2">Regresar</a>
                <button type="sumit" class="btn btn-success col-1 mx-2">Guardar</button>
            </div>
        </form>
    </div>
@endsection
