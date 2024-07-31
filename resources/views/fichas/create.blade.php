@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container py-4">
        <h2>Registrar Ficha</h2>

        <form action="{{ route('fichas.store') }}" method="post">

            @csrf
            <div class="md-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Numero de ficha:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control"  name="noFicha"  id="noFicha" value="{{old('noFicha')}}" required>
                </div>
            <a href="{{ route('fichas.index') }}"  class="btn btn-secondary">Regresar</a>
            <button type="sumit" class="btn btn-success">Guardar</button>
            </div>
    </form>
    </div>

</body>
</html>
@endsection
