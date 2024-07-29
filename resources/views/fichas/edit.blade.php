@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha</title>
</head>
<body>
    <div class="container py-4">
        <h2>Registrar Fichas</h2>

        <form action="{{ url('fichas/'.$ficha->id) }}" method="post">
            @method("PUT")
            @csrf
             <div class="md-3 row">
                  <label for="noFicha" class="col-sm-2 col-form-label">Nombre de la ficha:</label>
                  <div class="col-sm-5">
                      <input type="number" class="form-control"  name="noFicha"  id="noFicha" value="{{$ficha->noFicha}}" required>
                 </div>
              <a href="{{ url('fichas') }}"  class="btn btn-secondary">Regresar</a>
              <button type="sumit" class="btn btn-success">Guardar</button>
             </div>
    </form>
    </div>

</body>
</html>
@endsection
