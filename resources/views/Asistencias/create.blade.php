@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Asistencia</h1>

        <form action="{{ route('asistencias.store') }}" method="POST">
            @csrf

            <div class="container m-2">
                <label for="id_ficha" class="col-form-label">Ficha</label>
                <select name="id_ficha" id="id_ficha" class=" w-50 form-select" required>
                    <option value="" selected> Seleccione una ficha...</option>
                    @foreach ($fichas as $ficha)
                        <option value="{{$ficha->id}}">{{$ficha->noFicha}}</option>
                    @endforeach
                </select>
            </div>
            <div id="container" class='container m-3'>

            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-success text-center">Estudiante</th>
                        {{-- <th class="table-success text-center">Evento</th> --}}
                        <th class="table-success text-center">Asistió</th>
                        <th class="table-success text-center">No Asistió</th>
                        <th class="table-success text-center">Excusa</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach($aprendices as $aprendiz)
                        <tr class="text-center">
                            <input type="hidden" name="asistencias[{{ $aprendiz->id }}][id_aprendiz]" value="{{ $aprendiz->id }}">

                            <td>{{ $aprendiz->nombre }}</td>

                            <td>
                                <select name="asistencias[{{ $aprendiz->id }}][id_event]" class="form-control" required>
                                    <option value="">Elija un evento</option>
                                    @foreach($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <input type="checkbox" name="asistencias[{{ $aprendiz->id }}][datos_asistencia][asistio]" value="1">
                            </td>

                            <td class="text-center">
                                <input type="checkbox" name="asistencias[{{ $aprendiz->id }}][datos_asistencia][no_asistio]" value="1">
                            </td>

                            <td>
                                <input type="text" name="asistencias[{{ $aprendiz->id }}][datos_asistencia][excusa]" class="form-control" placeholder="Ingrese excusa">
                            </td>

                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
            <div class="d-flex align-items-start">
                <button type="submit" class="btn btn-primary me-2 col-2">Registrar Asistencias</button>
                <a href="{{ route('asistencias.index') }}" class="btn btn-secondary mt-0">Regresar</a>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/asistencia.js') }}"></script>
@endsection