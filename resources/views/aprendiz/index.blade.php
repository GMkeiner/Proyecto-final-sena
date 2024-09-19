@extends('layouts.app')

@section('content')
    <main>
        <div class="container py-4 border border-1">
            <div class="row m-3">
                <h2>Listado de aprendices</h2>
                <a href="{{ route('aprendiz.create') }}" class="btn btn-primary btn-sm col-2">Nuevo Aprendiz</a>
            </div>

            <table class="table table-hover table-bordered">
                <thead class="thead-light text-center">
                    <tr>
                        <th class="table-success">#</th>
                        <th class="table-success">Documento</th>
                        <th class="table-success">Nombre</th>
                        <th class="table-success">Apellido</th>
                        <th class="table-success">Correo</th>
                        <th class="table-success">Telefono</th>
                        <th class="table-success">Ficha</th>
                        <th class="table-success">Accion</th>
                        <th class="table-success">Accion</th>
                    </tr>
                </thead>
                <tbody class="text-center">
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
                                        class="btn btn-danger btn-sn position-stiky">Eliminar</button>
                                </form>
                            </td>
                        </tr>
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
    </main>
@endsection