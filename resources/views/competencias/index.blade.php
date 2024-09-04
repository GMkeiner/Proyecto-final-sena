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
<main>
     <div class="container py-4">
       <h2>Listado de Competencias</h2>
       <a href="{{url('competencias/create')}}" class="btn btn-primary btn-sm">Nuevo registro</a>
       <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Accion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competencia as $competencias)
            <tr>
                <td>{{ $competencias->id}}</td>
                <td>{{ $competencias->nombre}}</td>
                <td><a href="{{url('competencias/'.$competencias->id.'/edit')}}" class="btn btn-warning btn-sn">Editar</a></td>
                <td><form action="{{ url('competencias/'.$competencias->id)}}" method="post">
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
