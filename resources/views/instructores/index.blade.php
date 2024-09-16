@extends('layouts.app')

@section('content')
    <main>
        <div class="container py-4 border border-1">
            <div class="row m-3">
                <h2>Listado de instructores</h2>
                <a href="{{ url('instructores/create') }}" class="btn btn-primary btn-sm col-2">Nuevo registro</a>
            </div>
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th class="table-success">#</th>
                        <th class="table-success">Documento</th>
                        <th class="table-success">Nombre</th>
                        <th class="table-success">Apellido</th>
                        <th class="table-success">Correo</th>
                        <th class="table-success">Telefono</th>
                        <th class="table-success">Accion</th>
                        <th class="table-success">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($intructor as $instructores)
                        <tr class="text-center">
                            <td>{{ $instructores->id }}</td>
                            <td>{{ $instructores->documento }}</td>
                            <td>{{ $instructores->nombre }}</td>
                            <td>{{ $instructores->apellido }}</td>
                            <td>{{ $instructores->correo }}</td>
                            <td>{{ $instructores->telefono }}</td>
                            {{-- <td>{{ $instructores->cursos->Nombre}}</td> --}}
                            <td><a href="{{ url('instructores/' . $instructores->id . '/edit') }}"
                                    class="btn btn-warning btn-sn">Editar</a></td>
                            <td>
                                <form action="{{ url('instructores/' . $instructores->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit"
                                        onclick="return confirm('¿Esta usted seguro de querer borrar estos datos?')"
                                        class="btn btn-danger btn-sn">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @session('success')
                <div class="container bg-success bg-gradient text-light p-4">
                    {{ $value }}
                </div>
            @endsession
            @session('danger')
                <div class="container bg-danger bg-gradient text-light p-4">
                    {{ $value }}
                </div>
            @endsession
        </div>
    </main>
@endsection
