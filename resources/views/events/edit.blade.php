<!-- resources/views/events/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Evento</h1>
    
    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $event->name) }}" required>
        </div>
        @error('name')
            {{$message}}
        @enderror

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
        </div>
        @error('description')
            {{$message}}
        @enderror

        <div class="form-group3">
            <label for="event_dates">Fechas del Evento</label>
            @foreach($event->dates as $date)
                <input type="date" name="event_dates[]" class="form-control mb-2" value="{{ $date->event_date->format('Y-m-d') }}">
            @endforeach
            <div>
            {{-- <input type="text" name="event_dates[]" class="form-control mb-2" placeholder="Agregar más fechas">
            </div> --}}
            <button type="button" id="add_date" class="btn btn-secondary mt-3 p-1 ">Agregar Otra Fecha</button>
            <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3 p-1">Regresar</a>
        </div>
        @error('event_dates')
            {{$message}}
        @enderror

        <button type="submit" class="btn btn-primary mt-3 w-25">Actualizar Evento</button>
        
    </form>
    
    
</div>

<script>
    document.getElementById('add_date').addEventListener('click', function() {
        const input = document.createElement('input');
        input.type = 'date';
        input.name = 'event_dates[]';
        input.className = 'form-control mb-2';
        input.placeholder = 'Fecha adicional';
        document.querySelector('form .form-group3').appendChild(input);
        z
        // Re-initialize flatpickr for new date fields
        flatpickr(input, {
            dateFormat: "Y-m-d"
        });
    });

    // Initialize flatpickr for existing date fields
    flatpickr("input[name='event_dates[]']", {
        mode: "multiple",
        dateFormat: "Y-m-d"
    });
</script>
@endsection
