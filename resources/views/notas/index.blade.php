@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Listado de notas</h2>
    <form action="{{route('notas.create')}}" method="get">
            <div class="md-3 row">
                <label for="ficha_id" class="col-sm-2 col-form-label">Ficha:</label>
                <div class="col-sm-5">
                    <select name="ficha_id" id="" class="form-select">
                        <option selected disabled>Seleccione</option>
                        @foreach ($fichas as $ficha)
                            <option value="{{$ficha->id}}">{{$ficha->noFicha}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success btn-sm col-3">Agregar notas</button>
                </div>
            </div>
    </form>
    {{-- <a href="{{route('notas.create')}}" class="btn btn-primary">Agregar Notas</a> --}}
    <table class="table table-light">
        <thead class="thead-light">
            <th scope="col">Ficha</th>
            <th scope="col">Competencia</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            @foreach ($fichasPersonales->ficha as $fichas)
            <tr>
                <td>{{$fichas->noFicha}}</td>
                <td>{{$fichas->notas}}</td>
                {{-- <td>{{ $instructores->id}}</td>
                <td>{{ $instructores->documento}}</td>
                <td>{{ $instructores->nombre}}</td>
                <td>{{ $instructores->apellido}}</td>
                <td>{{ $instructores->correo}}</td>
                <td>{{ $instructores->telefono}}</td>
                <td><a href="{{url('instructores/'.$instructores->id.'/edit')}}" class="btn btn-warning btn-sn">Editar</a></td>
                <td><form action="{{ url('instructores/'.$instructores->id)}}" method="post">
                    {{ method_field("DELETE") }}
                    @csrf
                    <button type="submit" onclick="return confirm('¿Esta usted seguro de querer borrar estos datos?')"
                    class="btn btn-danger btn-sn">Eliminar</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
    {{$fichasPersonales->ficha}}
@endsection
