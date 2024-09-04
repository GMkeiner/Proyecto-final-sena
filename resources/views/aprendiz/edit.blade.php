@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/stylesUnico.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="container py-4">
        <h2>Registrar Aprendiz</h2>

        <form action="{{ url('aprendiz/'.$aprendiz->id) }}" method="post">
            @method("PUT")
            @csrf

            <div class="md-3 row">
                  <label for="aprendiz" class="col-sm-2 col-form-label">Documento del aprendiz:</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control"  name="documento"  id="documento" value="{{$aprendiz->documento}}" required>
                 </div>
            </div>
             <div class="md-3 row">
                  <label for="Nombre" class="col-sm-2 col-form-label">Nombre del aprendiz:</label>
                  <div class="col-sm-5">
                      <input type="text" class="form-control"  name="nombre"  id="nombre" value="{{$aprendiz->nombre}}" required>
                 </div>
            </div>
            <div class="md-3 row">
                  <label for="apellido" class="col-sm-2 col-form-label">Apellido del aprendiz:</label>
                <div class="col-sm-5">
                      <input type="text" class="form-control"  name="apellido"  id="apellido" value="{{$aprendiz->apellido}}" required>
                </div>
            </div>
            <div class="md-3 row">
                  <label for="nombre" class="col-sm-2 col-form-label">Correo del aprendiz:</label>
                  <div class="col-sm-5">
                      <input type="email" class="form-control"  name="correo"  id="correo" value="{{$aprendiz->correo}}" required>
                  </div>
            </div>
            <div class="md-3 row">
                  <label for="Telefono" class="col-sm-2 col-form-label">Telefono del aprendiz:</label>
                  <div class="col-sm-5">
                      <input type="number" class="form-control"  name="telefono"  id="telefono" value="{{$aprendiz->telefono}}" required>
                  </div>
            </div>
            <div class="md-3 row">
                <label for="ficha_id" class="col-sm-2 col-form-label">Fichas:</label>
                <div class="col-sm-5">
                    <select name="ficha_id" id="ficha_id" class="form-control" required>
                       <option value="{{$aprendiz->ficha_id }}">Seleccionar ficha</option>
                       @foreach ($ficha as $fichas)
                       <option value="{{$fichas->id }}">{{$fichas->noFicha }}</option>"
                       @endforeach
                    </select>
                </div>
              <a href="{{ url('aprendiz') }}"  class="btn btn-secondary">Regresar</a>
              <button type="sumit" class="btn btn-success">Guardar</button>
    </div>
    </form>
    </div>
</body>
</html>
@endsection