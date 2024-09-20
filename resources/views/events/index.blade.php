@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesCalendario.css') }}">

    <div class="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <script>
      
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
    <title>FullCalendar Tutorial</title>
    
    <div style="max-width: 1000px; margin: auto" id='calendar'></div>
        <div class="right">
            <div class="events"></div>                
            </div>
        </div>
        <form action="{{ route('events.store') }}" method="post">
                    @csrf
                    <div class="add-event-body">
                        <div class="add-event-input">
                            <label for="nombre">Nombre de la clase</label>
                            <input type="text" placeholder="Nombre de la clase" class="event-name" name="nombre" required />
                        </div>

                        <div class="add-event-input">
                            <label for="ficha_id">Numero de la ficha</label>
                            <select name="ficha_id" required class="form-select">
                                <option value="" selected>Seleccione uno...</option>
                                @foreach ($fichas as $ficha)
                                    <option value="{{ $ficha->id }}">{{ $ficha->noFicha }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="add-event-input">
                            <label for="fecha_inicio">Fecha inicial</label>
                            <input type="date" name="fecha_inicio" required>
                        </div>

                        <div id="check-form">
                            <div class="form-check">
                                <input type="checkbox" name="dias[]" class="form-check-input" value="Monday" id="Monday">
                                <label for="Monday" class="form-check-label">Lunes</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="dias[]" class="form-check-input" value="Tuesday" id="Tuesday">
                                <label for="Tuesday" class="form-check-label">Martes</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="dias[]" class="form-check-input" value="Wednesday" id="Wednesday">
                                <label for="Wednesday" class="form-check-label">Miércoles</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="dias[]" class="form-check-input" value="Thursday" id="Thursday">
                                <label for="Thursday" class="form-check-label">Jueves</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="dias[]" class="form-check-input" value="Friday" id="Friday">
                                <label for="Friday" class="form-check-label">Viernes</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="dias[]" class="form-check-input" value="Saturday" id="Saturday">
                                <label for="Saturday" class="form-check-label">Sábado</label>
                            </div>
                        </div>

                        <div class="add-event-input">
                            <input type="time" name="hora_inicio" required min="06:30" max="18:00">
                            <input type="time" name="hora_final" required min="07:00" max="21:00">
                        </div>
                    </div>

                    <div class="add-event-footer">
                        <button type="submit" class="add-event-btn">Crear</button>
                    </div>
                </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/calendary.js') }}"></script>
      <script src="{{ asset('assets/js/calendary.js') }}"></script>
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
