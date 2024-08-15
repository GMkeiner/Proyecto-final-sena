@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Listado de notas</h2>
    <a href="{{route('notas.create')}}" class="btn btn-primary">Agregar Notas</a>
    <table class="table table-light">
        <thead class="thead-light">
            <th scope="col">Ficha</th>
            <th scope="col">Competencia</th>
            <th scope="col">Acciones</th>
        </thead>
    </table>
</div>
    
@endsection
