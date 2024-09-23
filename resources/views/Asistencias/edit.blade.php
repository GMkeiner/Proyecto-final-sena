@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Asistencias</h1>

        <form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="container m-2">
                <label for="id_ficha" class="col-form-label">Ficha</label>
                <select name="id_ficha" id="id_ficha" class=" w-50 form-select" required>
                    <option value="" selected> Seleccione una ficha...</option>
                    @foreach ($fichas as $ficha)
                        <option value="{{ $ficha->id }}"
                            @if ($ficha->id == $asistencia->ficha_id) @selected(true) @endif>{{ $ficha->noFicha }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div id="container" class='container m-3'>
                <label for="mes" class="col-form-label">Mes:</label>
                <select name="mes" id="mes" class="form-select w-50" required>
                    @foreach ($meses as $mes)
                        <option value="$mes" @if ($mes == $asistencia->evento[1]) @selected(true) @endif>
                            {{ $mes }}</option>
                    @endforeach
                </select>
                <label for="nombre" id="nombre" class="col-form-label">Clase:</label>
                <select name="nombre" id="nombre" class="form-select w-50" required>
                    @foreach ($clases as $nombre)
                        <option value="{{ $nombre }}"
                            @if ($nombre == $asistencia->evento[0]) @selected(true) @endif>{{ $nombre }}
                        </option>
                    @endforeach
                </select>
                <label for="dia" id="dia" class="col-form-label">Dia:</label>
                <select name="dia" id="dia" class="form-select w-50" required>
                    @foreach ($dias as $dia)
                        <option value="{{ $dia }}"
                            @if ($dia == $asistencia->evento[2]) @selected(true) @endif>{{ $dia }}
                        </option>
                    @endforeach
                </select>
            </div>

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="table-success text-center">Id</th>
                        <th class="table-success text-center">Estudiante</th>
                        <th class="table-success text-center">Asistió</th>
                        <th class="table-success text-center">No Asistió</th>
                        <th class="table-success text-center">Excusa</th>
                    </tr>
                </thead>
                <tbody id="tabla">
                    @foreach ($aprendices as $aprendiz)
                        <tr class="text-center">
                            <input type="hidden" name="asistencias[{{$aprendiz->id}}][id_aprendiz]" value="{{$aprendiz->id}}">
                            <td>{{ $aprendiz->id }}</td>
                            <td>{{ $aprendiz->nombre }} {{ $aprendiz->apellido }}</td>
                            <td class="text-center"><input type="checkbox" name="asistencias[{{$aprendiz->id}}][id_aprendiz][asistio]" @foreach($asistencia->asistieron as $asis)
                                @if (array_search($aprendiz->id,$asis)) @checked(true) @php $excusa=$asis["datos_asistencia"]["excusa"] @endphp @endif
                            @endforeach value="1"></td>
                            <td class="text-center"><input type="checkbox" name="asistencias[{{$aprendiz->id}}][id_aprendiz][no_asistio]" @foreach($asistencia->no_asistieron as $asis)
                                @if (array_search($aprendiz->id,$asis)) @checked(true) @php $excusa=$asis["datos_asistencia"]["excusa"] @endphp @endif
                            @endforeach value="1"></td>
                            <td><input type="text" placeholder="Ingrese su excusa" value="{{$excusa}}" class="form-control"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex align-items-start">
                <button type="submit" class="btn btn-primary me-2 col-2">Actualizar Asistencias</button>
                <a href="{{ route('asistencias.index') }}" class="btn btn-secondary mt-0">Regresar</a>
            </div>
        </form>
    </div>
@endsection
