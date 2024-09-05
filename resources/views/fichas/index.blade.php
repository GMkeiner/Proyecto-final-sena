@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-1">
        <div class="container-sm my-3">
            <h2>Listado de fichas</h2>
            <a href="{{ url('fichas/create') }}" class="btn btn-primary btn-sm">Nuevo registro</a>
        </div>

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Num Fichas</th>
                    <th scope="col">Instructores</th>
                    <th scope="col">Accion</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ficha as $fichas)
                    <tr>
                        <td>{{ $fichas->id }}</td>
                        <td>{{ $fichas->noFicha }}</td>
                        <td>
                            @foreach ($fichas->instructor as $instructor)
                                @if ($loop->last)
                                    {{ $instructor->nombre }} {{ $instructor->apellido }}.
                                @else
                                    {{ $instructor->nombre }} {{ $instructor->apellido }},
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ url('fichas/' . $fichas->id . '/edit') }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ url('fichas/' . $fichas->id) }}" method="post">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('¿Esta usted seguro de querer borrar estos datos?')"
                                    class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        <td><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#instructor{{ $fichas->id }}">
                                Nuevo instructor
                            </button></td>
                        </td>
                    </tr>
                    @include('fichas.instructor')
                @endforeach
            </tbody>
        </table>
    </div>
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
@endsection
