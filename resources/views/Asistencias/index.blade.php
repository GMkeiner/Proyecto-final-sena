@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asistencias</h1>
        <a href="{{ route('asistencias.create') }}" class="btn btn-primary col-2 my-2">Crear Asistencia</a>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="table-success text-center">Ficha</th>
                    <th class="table-success text-center">Evento</th>
                    <th class="table-success text-center">Asistieron</th>
                    <th class="table-success text-center">No Asistieron</th>
                    <th class="table-success text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($asistencias as $asistencia)
                    <tr>
                        {{-- <td>{{ $asistencia->aprendiz->nombre }}</td>
                        <td>{{ $asistencia->event->name}}</td>
                        <td>{{ isset($asistencia->datos_asistencia['asistio']) && $asistencia->datos_asistencia['asistio'] ? 'Sí' : 'No' }}</td>
                        <td>{{ isset($asistencia->datos_asistencia['no_asistio']) && $asistencia->datos_asistencia['no_asistio'] ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger col-3">Eliminar</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
