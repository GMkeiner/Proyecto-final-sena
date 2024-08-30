@extends('layouts.app')

@section('content')
    <main>
        <div class="container py-4">
            <div class="row m-3">
                <h2>Listado de aprendices</h2>
                <a href="{{ route('aprendiz.create') }}" class="btn btn-primary btn-sm col-2">Nuevo Aprendiz</a>
            </div>

            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Ficha</th>
                        <th>Accion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aprendiz as $aprendices)
                        <tr>
                            <td>{{ $aprendices->id }}</td>
                            <td>{{ $aprendices->documento }}</td>
                            <td>{{ $aprendices->nombre }}</td>
                            <td>{{ $aprendices->apellido }}</td>
                            <td>{{ $aprendices->correo }}</td>
                            <td>{{ $aprendices->telefono }}</td>
                            <td>{{ $aprendices->ficha->noFicha }}</td>
                            <td><a href="{{ route('aprendiz.edit', $aprendices->id) }}"
                                    class="btn btn-warning btn-sn">Editar</a></td>
                            <td>
                                <form action="{{ route('aprendiz.destroy', $aprendices->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit"
                                        onclick="return confirm('¿Esta usted seguro de querer borrar estos datos?')"
                                        class="btn btn-danger btn-sn">Eliminar</button>
                                </form>
                            </td>
                        </tr>
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
    </main>
@endsection
