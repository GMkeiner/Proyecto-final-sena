@extends('layouts.app')

@section('content')
    <div class="container py-4 border border-1">
        <div class="container-sm my-3">
            <h2>Listado de fichas</h2>
            <a href="{{ url('fichas/create') }}" class="btn btn-primary btn-sm">Nuevo registro</a>
        </div>

        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="table-success text-center">#</th>
                    <th scope="col" class="table-success text-center">Num Fichas</th>
                    <th scope="col" class="table-success text-center">Instructores</th>
                    <th scope="col" class="table-success text-center">Accion</th>
                    <th scope="col" class="table-success text-center">Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ficha as $fichas)
                    <tr>
                        <td class="text-center">{{ $fichas->id }}</td>
                        <td class="text-center">{{ $fichas->noFicha }}</td>
                        <td class="text-center">
                            @foreach ($fichas->instructor as $instructor)
                                @if ($loop->last)
                                    {{ $instructor->nombre }} {{ $instructor->apellido }}.
                                @else
                                    {{ $instructor->nombre }} {{ $instructor->apellido }},
                                @endif
                            @endforeach
                        </td>
                        <td class="text-center">
                            <form action="{{ url('fichas/' . $fichas->id) }}" method="post">
                                <a href="{{ url('fichas/' . $fichas->id . '/edit') }}"
                                    class="btn btn-warning btn-sm ">Editar</a>
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit"
                                    onclick="return confirm('¿Esta usted seguro de querer borrar estos datos?')"
                                    class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        <td class="text-center"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#instructor{{ $fichas->id }}">
                                Nuevo instructor
                            </button></td>
                        </td>
                    </tr>
                    @include('fichas.instructor')
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

@endsection
