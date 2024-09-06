@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Asistencias</h1>

        <form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST">
            @csrf
            @method('PUT')

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
                        @php
                            $asistenciaData = $asistencia->where('id_aprendiz', $aprendiz->id)->first();
                        @endphp
                        <tr>
                            <input type="hidden" name="asistencias[{{ $aprendiz->id }}][id_aprendiz]" value="{{ $aprendiz->id }}">

                            <td>{{ $aprendiz->nombre }}</td>

                            <td>
                                <select name="asistencias[{{ $aprendiz->id }}][id_event]" class="form-control">
                                    <option value="">Elija un evento</option>
                                    @foreach($events as $eventOption)
                                        <option value="{{ $eventOption->id }}" {{ isset($asistenciaData) && $eventOption->id == $asistenciaData->id_event ? 'selected' : '' }}>
                                            {{ $eventOption->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <input type="checkbox" name="asistencias[{{ $aprendiz->id }}][datos_asistencia][asistio]" value="1" {{ isset($asistenciaData->datos_asistencia['asistio']) && $asistenciaData->datos_asistencia['asistio'] ? 'checked' : '' }}>
                            </td>

                            <td>
                                <input type="checkbox" name="asistencias[{{ $aprendiz->id }}][datos_asistencia][no_asistio]" value="1" {{ isset($asistenciaData->datos_asistencia['no_asistio']) && $asistenciaData->datos_asistencia['no_asistio'] ? 'checked' : '' }}>
                            </td>

                            <td>
                                <input type="text" name="asistencias[{{ $aprendiz->id }}][datos_asistencia][excusa]" class="form-control" placeholder="Ingrese excusa" value="{{ $asistenciaData->datos_asistencia['excusa'] ?? '' }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Actualizar Asistencias</button>
        </form>
    </div>
@endsection
