{{--Luis alli te deje el codigo para usar sweep alert solo descomenttas el codigo donde estan los botones y descomentas tambien el codigo que tiene el sweep alert y listo deberia funcionarte--}}

{{--En layouts/app.blade.php te deje ya configurado sweep alert para que asi de funcione y no te presente problemas--}}

@extends('layouts.app')

@section('content')
    <main>
        <div class="container py-4 border border-1">
            <div class="row m-3">
                <h2>Listado de aprendices</h2>
                <a href="{{ route('aprendiz.create') }}" class="btn btn-primary btn-sm col-2">Nuevo Aprendiz</a>
            </div>

<<<<<<< HEAD
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Ficha</th>
                        <th>Accion</th>
                        <th>Accion</th>
                    </tr>
                {{-- </thead>
                <tbody>
                    @foreach ($aprendiz as $aprendices)
                        <tr>
                            <td>{{ $aprendices->id }}</td>
                            <td>{{ $aprendices->documento }}</td>
                            <td>{{ $aprendices->nombre }}</td>
                            <td>{{ $aprendices->apellido }}</td>
                            <td>{{ $aprendices->correo }}</td>
                            <td>{{ $aprendices->telefono }}</td>
                            <td>{{ $aprendices->ficha->noFicha }}</td>
                            <td><a href="{{ route('aprendiz.edit', $aprendices->id) }}"
                                    class="btn btn-warning btn-sn">Editar</a></td>
                            <td>
                                <button class="btn btn-danger btn-sn delete-button" 
                                        data-form-id="form-{{ $aprendices->id }}">Eliminar</button>
                                <form id="form-{{ $aprendices->id }}" 
                                      action="{{ route('aprendiz.destroy', $aprendices->id) }}" 
                                      method="post" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
                <tbody>
=======
            <table class="table table-hover table-bordered">
                <thead class="thead-light text-center">
                    <tr>
                        <th class="table-success">#</th>
                        <th class="table-success">Documento</th>
                        <th class="table-success">Nombre</th>
                        <th class="table-success">Apellido</th>
                        <th class="table-success">Correo</th>
                        <th class="table-success">Telefono</th>
                        <th class="table-success">Ficha</th>
                        <th class="table-success">Accion</th>
                        <th class="table-success">Accion</th>
                    </tr>
                </thead>
                <tbody class="text-center">
>>>>>>> main
                    @foreach ($aprendiz as $aprendices)
                        <tr>
                            <td>{{ $aprendices->id }}</td>
                            <td>{{ $aprendices->documento }}</td>
                            <td>{{ $aprendices->nombre }}</td>
                            <td>{{ $aprendices->apellido }}</td>
                            <td>{{ $aprendices->correo }}</td>
                            <td>{{ $aprendices->telefono }}</td>
                            <td>{{ $aprendices->ficha->noFicha }}</td>
                            <td><a href="{{ route('aprendiz.edit', $aprendices->id) }}"
                                    class="btn btn-warning btn-sn">Editar</a></td>
                            <td>
                                <form action="{{ route('aprendiz.destroy', $aprendices->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit"
                                        onclick="return confirm('¿Esta usted seguro de querer borrar estos datos?')"
<<<<<<< HEAD
                                        class="btn btn-danger btn-sn">Eliminar</button>
=======
                                        class="btn btn-danger btn-sn position-stiky">Eliminar</button>
>>>>>>> main
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
<<<<<<< HEAD
        </div>
        @session('success')
            <div class="container bg-success bg-gradient text-light p-4">
                {{ $value }}
            </div>
        @endsession
        @session('danger')
            <div class="container bg-danger bg-gradient text-light p-4">
                {{ $value }}
            </div>
        @endsession
    </main>

    {{-- @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function() {
                    const formId = this.getAttribute('data-form-id');
                    Swal.fire({
                        title: "¿Estás seguro?",
                        text: "¡No podrás revertir esto!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Sí, eliminarlo!",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(formId).submit();
                        }
                    });
                });
            });
        });
    </script>
    @endpush --}}
@endsection
=======
            @session('success')
                <div class="container bg-success bg-gradient text-light p-4">
                    {{ $value }}
                </div>
            @endsession
            @session('danger')
                <div class="container bg-danger bg-gradient text-light p-4">
                    {{ $value }}
                </div>
            @endsession
        </div>
    </main>
@endsection
>>>>>>> main
