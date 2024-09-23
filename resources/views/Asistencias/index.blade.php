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
                        <td>{{ $asistencia->ficha->noFicha }}</td>
                        <td>
                            <ul>
                                <li><b>Nombre:</b> {{ $asistencia->evento[0] }}</li>
                                <li><b>Mes:</b> {{ $asistencia->evento[1] }}</li>
                                <li><b>Dia:</b> {{ $asistencia->evento[2] }}</li>
                                <li><b>Hora inicial:</b> {{ $asistencia->evento[3] }}</li>
                                <li><b>Hora final:</b> {{ $asistencia->evento[4] }}</li>
                            </ul>
                        </td>
                        <td>
                            @foreach ($asistencia->asistieron as $aprendiz)
                                {{ $asistencia->ficha->aprendices->where('id', '=', $aprendiz['id_aprendiz'])->first()->nombre }}
                                {{ $asistencia->ficha->aprendices->where('id', '=', $aprendiz['id_aprendiz'])->first()->apellido }}
                                @if ($loop->last)
                                    .
                                @else
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($asistencia->no_asistieron as $aprendiz)
                                {{ $asistencia->ficha->aprendices->where('id', '=', $aprendiz['id_aprendiz'])->first()->nombre }}
                                {{ $asistencia->ficha->aprendices->where('id', '=', $aprendiz['id_aprendiz'])->first()->apellido }}
                                @if ($loop->last)
                                    .
                                @else
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger col-4">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{-- <!-- @foreach ($asistencias as $asistencia)
                    <tr>
                         
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
                        </td> 
                    </tr>
                @endforeach --> --}}
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @session('success')
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ $value }}',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endsession
@endsection
