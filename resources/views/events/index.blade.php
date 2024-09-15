<!-- resources/views/events/index.blade.php -->
@extends('layouts.app')

@section('css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesCalendario.css') }}">
@endsection
@section('content')
    <div>
        <h1>Lista de Eventos</h1>
        {{-- <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Crear Evento</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif --}}
        {{-- <table class="table table-hover table-bordered">
        <thead class="text-center">
            <tr>
                <th class="table-success">Nombre</th>
                <th class="table-success">Descripción</th>
                <th class="table-success">Fechas del Evento</th>
                <th class="table-success">Acciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
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
    </table> --}}
        <div class="container">
            <div class="left">
                <div class="calendar">
                    <div class="month">
                        <i class="fas fa-angle-left prev"></i>
                        <div class="date">december 2015</div>
                        <i class="fas fa-angle-right next"></i>
                    </div>
                    <div class="weekdays">
                        <div>Do</div>
                        <div>Lu</div>
                        <div>Ma</div>
                        <div>Mi</div>
                        <div>Ju</div>
                        <div>Vi</div>
                        <div>Sa</div>
                    </div>
                    <div class="days"></div>
                    <div class="goto-today">
                        <div class="goto">
                            <input type="text" placeholder="mm/yyyy" class="date-input" />
                            <button class="goto-btn">Buscar</button>
                        </div>
                        <button class="today-btn">Hoy</button>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="today-date">
                    <div class="event-day">wed</div>
                    <div class="event-date">12th december 2022</div>
                </div>
                <div class="events"></div>
                <div class="add-event-wrapper">
                    <div class="add-event-header">
                        <div class="title">Añadir evento</div>
                        <i class="fas fa-times close"></i>
                    </div>
                    <div class="add-event-body">
                        <div class="add-event-input">
                            <input type="text" placeholder="Nombre del evento" class="event-name" />
                        </div>
                        <div class="add-event-input">
                            <input type="text" placeholder="Desde" class="event-time-from" />
                        </div>
                        <div class="add-event-input">
                            <input type="text" placeholder="Hasta" class="event-time-to" />
                        </div>
                    </div>
                    <div class="add-event-footer">
                        <button class="add-event-btn">Añadir</button>
                    </div>
                </div>
            </div>
            <button class="add-event">
                <i class="fas fa-plus"></i>
            </button>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/calendary.js') }}"></script>
@endsection
