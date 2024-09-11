{{-- <!-- resources/views/events/create.blade.php o edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($event) ? 'Editar Evento' : 'Crear Evento' }}</h1>
    <form action="{{ isset($event) ? route('events.update', $event) : route('events.store') }}" method="POST">
        @csrf
        @isset($event)
            @method('PUT')
        @endisset

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $event->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $event->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="event_dates">Fechas del Evento</label>
            <div id="event_dates_container">
                <input type="date" name="event_dates[]" class="form-control mb-2" required>
                <!-- Agregar más campos de fecha aquí -->
                
            </div>
            <button type="button" id="add_date" class="btn btn-secondary">Agregar Fecha</button>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($event) ? 'Actualizar' : 'Crear' }}</button>
    </form>
</div>

@section('scripts')
<script>
    document.getElementById('add_date').addEventListener('click', function() {
        const container = document.getElementById('event_dates_container');
        const input = document.createElement('input');
        input.type = 'date';
        input.name = 'event_dates[]';
        input.className = 'form-control mb-2';
        container.appendChild(input);
    });
</script>
@endsection
@endsection --}}




@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($event) ? 'Editar Evento' : 'Crear Evento' }}</h1>
    <form action="{{ isset($event) ? route('events.update', $event) : route('events.store') }}" method="POST">
        @csrf
        @isset($event)
            @method('PUT')
        @endisset

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $event->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $event->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="event_dates">Fechas del Evento</label>
            <div id="event_dates_container">
                <input type="date" name="event_dates[]" class="form-control mb-2" required>
            </div>
            <button type="button" id="add_date" class="btn btn-secondary">Agregar Fecha</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary ">Regresar</a>
        </div>

        <button type="submit" class="btn btn-primary mt-2 w-25">{{ isset($event) ? 'Actualizar' : 'Crear' }}</button>

    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('add_date').addEventListener('click', function() {
            const container = document.getElementById('event_dates_container');
            const input = document.createElement('input');
            input.type = 'date';
            input.name = 'event_dates[]';
            input.className = 'form-control mb-2';
            container.appendChild(input);
        });
    });
</script>
@endsection

