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
       <h2>Listado de profesores</h2>
       <a href="{{url('instructores/create')}}" class="btn btn-primary btn-sm">Nuevo registro</a>
       <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Accion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($intructor as $instructores)
            <tr>
                <td>{{ $instructores->id}}</td>
                <td>{{ $instructores->documento}}</td>
                <td>{{ $instructores->nombre}}</td>
                <td>{{ $instructores->apellido}}</td>
                <td>{{ $instructores->correo}}</td>
                <td>{{ $instructores->telefono}}</td>
                {{-- <td>{{ $instructores->cursos->Nombre}}</td> --}}
                <td><a href="{{url('instructores/'.$instructores->id.'/edit')}}" class="btn btn-warning btn-sn">Editar</a></td>
                <td><form action="{{ url('instructores/'.$instructores->id)}}" method="post">
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
        @session('success')
            {{ $value }}
        @endsession
        @session('danger')
            {{ $value }}
        @endsession
     </div>


</main>

</body>
</html>
@endsection
