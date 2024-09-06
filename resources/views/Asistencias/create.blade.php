@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Asistencia</h1>

        <form action="{{ route('asistencias.store') }}" method="POST">
            @csrf

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Evento</th>
                        <th>Asistió</th>
                        <th>No Asistió</th>
                        <th>Excusa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($aprendices as $aprendiz)
                        <tr>
                            <input type="hidden" name="asistencias[{{ $aprendiz->id }}][id_aprendiz]" value="{{ $aprendiz->id }}">

                            <td>{{ $aprendiz->nombre }}</td>

                            <td>
                                <select name="asistencias[{{ $aprendiz->id }}][id_event]" class="form-control">
                                    <option value="">Elija un evento</option>
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <input type="checkbox" name="asistencias[{{ $aprendiz->id }}][datos_asistencia][asistio]" value="1">
                            </td>

                            <td>
                                <input type="checkbox" name="asistencias[{{ $aprendiz->id }}][datos_asistencia][no_asistio]" value="1">
                            </td>

                            <td>
                                <input type="text" name="asistencias[{{ $aprendiz->id }}][datos_asistencia][excusa]" class="form-control" placeholder="Ingrese excusa">
                            </td>

                            <td>
                                <!-- Sección de acciones, si es necesario -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Registrar Asistencias</button>
        </form>
    </div>
@endsection
