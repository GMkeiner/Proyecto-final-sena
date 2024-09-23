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
        <div class="row">
        <div class="col d-flex justify-content-end">
                <div class="mx-auto p-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventModal">
                        Crear Evento
                    </button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ms-auto text-center d-flex" id="eventModalLabel">Crear Evento</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('events.store') }}" method="post" class="form">
                    @csrf
                    <div class="add-event-body">
                        <div class="add-event-input">
                            <label for="nombre">Nombre de la clase</label>
                            <input type="text" placeholder="Nombre de la clase" class="form-control" name="nombre" required />
                        </div>

                        <div class="add-event-input">
                            <label for="ficha_id">Número de la ficha</label>
                            <select name="ficha_id" required class="form-control">
                                <option value="" selected>Seleccione uno...</option>
                                @foreach ($fichas as $ficha)
                                    <option value="{{ $ficha->id }}">{{ $ficha->noFicha }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="add-event-input">
                            <label for="fecha_inicio">Fecha inicial</label>
                            <input type="date" name="fecha_inicio" class="form-control" required>
                        </div>

                        <div id="check-form" class="mb-3">
                            @foreach (['Monday' => 'Lunes', 'Tuesday' => 'Martes', 'Wednesday' => 'Miércoles', 'Thursday' => 'Jueves', 'Friday' => 'Viernes', 'Saturday' => 'Sábado'] as $value => $label)
                                <div class="form-check">
                                    <input type="checkbox" name="dias[]" class="form-check-input" value="{{ $value }}" id="{{ $value }}">
                                    <label for="{{ $value }}" class="form-check-label">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="add-event-input">
                            <label for="hora_inicio">Hora inicial</label>
                            <input type="time" name="hora_inicio" class="form-control" required min="06:30" max="18:00">
                        </div>
                        
                        <div class="add-event-input">
                            <label for="hora_final">Hora final...</label>
                            <input type="time" name="hora_final" class="form-control" required min="07:00" max="21:00">
                        </div>
                    </div>
                    <div class="add-event-footer mt-3">
                        <button type="submit" class="btn btn-success">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
