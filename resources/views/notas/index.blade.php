@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Listado de notas</h2>
    <form action="{{route('notas.create')}}" method="get">
            <div class="md-3 row">
                <label for="ficha_id" class="col-sm-2 col-form-label">Ficha:</label>
                <div class="col-sm-5">
                    <select name="ficha_id" id="" class="form-select">
                        <option selected disabled>Seleccione</option>
                        @foreach ($fichas as $ficha)
                            <option value="{{$ficha->id}}">{{$ficha->noFicha}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success btn-sm col-3">Agregar notas</button>
                </div>
            </div>
    </form>
    {{-- <a href="{{route('notas.create')}}" class="btn btn-primary">Agregar Notas</a> --}}
    <table class="table table-light">
        <thead class="thead-light">
            <th scope="col">Ficha</th>
            <th scope="col">Competencia</th>
            <th scope="col">Acciones</th>
        </thead>
        <tbody>
            <tr>
                @foreach ($fichasPersonales->ficha as $fichas)
                    @foreach ($fichas->competencia as $competencias)
                        @if ($competencias->notas->notas == null)
                            @continue
                        @endif
                        <td>{{$fichas->noFicha}}</td>
                        <td>{{$competencias->nombre}}</td>
                        <td><a href="{{route('notas.edit',['fichas'=>$fichas->id,'competencia'=>$competencias->id])}}"><img width="48" height="48" src="https://img.icons8.com/fluency-systems-regular/48/preview-pane.png" alt="preview-pane"/></a>
                        </td>
                    @endforeach
                @endforeach
                {{--
                <td><form action="{{ url('instructores/'.$instructores->id)}}" method="post">
                    {{ method_field("DELETE") }}
                    @csrf
                    <button type="submit" onclick="return confirm('¿Esta usted seguro de querer borrar estos datos?')"
                    class="btn btn-danger btn-sn">Eliminar</button>
                    </form>
                </td> --}}
            </tr>
        </tbody>
        
    </table>
</div>
    {{-- {{$fichasPersonales->ficha}} --}}
@endsection
