@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asistencias</h1>
        <a href="{{ route('asistencias.create') }}" class="btn btn-primary">Crear Asistencia</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Aprendiz</th>
                    <th>Evento</th>
                    <th>Asistió</th>
                    <th>No Asistió</th>
                    <th>Excusa</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asistencias as $asistencia)
                    <tr>
                        <td>{{ $asistencia->aprendiz->nombre }}</td>
                        <td>{{ $asistencia->event->name}}</td>
                        <td>{{ isset($asistencia->datos_asistencia['asistio']) && $asistencia->datos_asistencia['asistio'] ? 'Sí' : 'No' }}</td>
                        <td>{{ isset($asistencia->datos_asistencia['no_asistio']) && $asistencia->datos_asistencia['no_asistio'] ? 'Sí' : 'No' }}</td>
                        <td>{{ $asistencia->datos_asistencia['excusa'] ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
