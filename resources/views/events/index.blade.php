@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesCalendario.css') }}">

    <body>
        <!-- <h1>Calendario de Eventos</h1> -->
        <div class="container">
            <div class="left">
                <div class="calendar">
                    <div class="month">
                        <i class="fas fa-angle-left prev"></i>
                        <div class="date">December 2015</div>
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
                    <div class="event-day">Wed</div>
                    <div class="event-date">12th December 2022</div>
                </div>
                <div class="events"></div>
                <div class="add-event-wrapper">
                    <div class="add-event-header">
                        <div class="title">Añadir evento</div>
                        <i class="fas fa-times close"></i>
                    </div>
                    <form action="{{ route('events.store') }}" method="post">
                        @csrf
                        <div class="add-event-body">
                            <div class="add-event-input">
                                <label for="nombre">Nombre de la clase</label>
                                <input type="text" placeholder="Nombre de la clase" class="event-name" name="nombre"
                                    required />
                            </div>
                            <div class="add-event-input">
                                <label for="ficha_id">Numero de la ficha</label>
                                <select name="ficha_id" required class="form-select">
                                    <option value="" selected> Seleccione uno...</option>
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
                            {{-- <div class="add-event-input"></div> --}}
                            {{-- <div class="add-event-input">
                                <input type="text" placeholder="Desde" class="event-time-from" />
                            </div>
                            <div class="add-event-input">
                                <input type="text" placeholder="Hasta" class="event-time-to" />
                            </div> --}}
                        </div>
                        <div class="add-event-footer">
                            <button type="submit" class="add-event-btn">Crear</button>
                        </div>
                    </form>
                </div>
            </div>
            <button class="add-event">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        </div>
    @section('scripts')
        <script src="{{ asset('assets/js/calendary.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @session('success')
        <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ $value }}' ,
                    confirmButtonText: 'Aceptar'
                });
        </script>
        @endsession
    @endsection
</body>

</html>

@endsection
