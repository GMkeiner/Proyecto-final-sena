<!-- resources/views/events/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Eventos</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Crear Evento</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fechas del Evento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>
                        <ul>
                            @foreach ($event->dates as $date)
                                <li>{{ $date->event_date->format('d-m-Y') }}</li>
                            @endforeach
                        </ul>
                    </td>
                   <!-- resources/views/events/index.blade.php -->

                    <td>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline-block;">
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
