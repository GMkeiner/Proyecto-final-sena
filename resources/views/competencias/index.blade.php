@extends('layouts.app')

@section('content')
    <main>
        <div class="container py-4 border border-1">
            <div class="container-sm my-3">
                <h2>Listado de Competencias</h2>
                <a href="{{ route('competencias.create') }}" class="btn btn-primary btn-sm">Nuevo registro</a>
            </div>
            <table class="table table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th class="table-success text-center">#</th>
                        <th class="table-success text-center">Nombre</th>
                        <th class="table-success text-center">Instructor</th>
                        <th class="table-success text-center">Accion</th>
                        <th class="table-success text-center">Accion</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($competencia as $competencias)
                        <tr>
                            <td>{{ $competencias->id }}</td>
                            <td>{{ $competencias->nombre }}</td>
                            <td>{{ $competencias->instructor->nombre . ' ' . $competencias->instructor->apellido }}</td>
                            <td><a href="{{ route('competencias.edit', $competencias->id) }}"
                                    class="btn btn-warning btn-sm">Editar</a></td>
                            <td>
                                <form action="{{ route('competencias.destroy', $competencias->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"
                                        onclick="return confirm('¿Esta usted seguro de querer borrar estos datos?')"
                                        class="btn btn-danger btn-sm">Eliminar</button>
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
