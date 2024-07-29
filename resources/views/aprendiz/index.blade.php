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

<main>
     <div class="container py-4">
       <h2>Listado de aprendices</h2>
       <a href="{{route('aprendiz.create')}}" class="btn btn-primary btn-sm">Nuevo registro</a>
       <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Ficha</th>
                <th>Accion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($aprendiz as $aprendices)
            <tr>
                <td>{{ $aprendices->id}}</td>
                <td>{{ $aprendices->documento}}</td>
                <td>{{ $aprendices->nombre}}</td>
                <td>{{ $aprendices->apellido}}</td>
                <td>{{ $aprendices->correo}}</td>
                <td>{{ $aprendices->telefono}}</td>
                <td>{{ $aprendices->ficha->noFicha}}</td>
                <td><a href="{{url('aprendiz/'.$aprendices->id.'/edit')}}" class="btn btn-warning btn-sn">Editar</a></td>
                <td><form action="{{ url('aprendices/'.$aprendices->id)}}" method="post">
                    {{ method_field("DELETE") }}
                    @csrf
                    <button type="submit" onclick="return confirm('¿Esta usted seguro de querer borrar estos datos?')"
                    class="btn btn-danger btn-sn">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
     </div>


</main>
</body>
</html>
@endsection
