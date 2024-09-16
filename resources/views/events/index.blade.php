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
    @section('scripts')
            <script src="{{ asset('assets/js/calendary.js') }}"></script>
    @endsection
</body>
</html>

@endsection
