@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h2>Listado de notas</h2>
        <form action="{{ route('notas.create') }}" method="get">
            <div class="my-3 row">
                <label for="ficha_id" class="col-sm-2 col-form-label">Ficha:</label>
                <div class="col-sm-5">
                    <select name="ficha_id" required class="form-select">
                        <option selected value="">Seleccione</option>
                        @foreach ($fichas as $ficha)
                            <option value="{{ $ficha->id }}">{{ $ficha->noFicha }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-sm col-3">Agregar notas</button>
            </div>
        </form>
        <table class="table table-light">
            <thead class="thead-light">
                <th scope="col">Ficha</th>
                <th scope="col">Competencia</th>
                <th scope="col">Acciones</th>
            </thead>
            <tbody>
                @if ($competencias != null)
                    @foreach ($competencias as $competencia)
                        <tr>
                            <td>{{ $competencia->get('ficha') }}</td>
                            <td>{{ $competencia->get('competencia')->nombre }}</td>
                            <td><a
                                href="{{ route('notas.competencias.edit', ['fichas' => $competencia->get('ficha_id'), 'competencia' => $competencia->get('competencia')->id]) }}"><img
                                    width="48" height="48"
                                    src="https://img.icons8.com/fluency-systems-regular/48/preview-pane.png"
                                    alt="preview-pane" /></a></td>
                        </tr>
                    @endforeach
                @endif
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
