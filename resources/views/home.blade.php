@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            {{-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <h1> Bienvenidos </h1>
                    @role('Admin')
                    <h1> Eres admin </h1>
                    @endrole
                    @role('Aprendiz')
                    <h1> Eres aprendiz </h1>
                    @endrole
                    @role('Instructor')
                    <h1>Eres un instructor</h1>
                    @endrole
                </div>
            </div>       --}}
            <iframe width="100%" height="1000" src="https://app.powerbi.com/view?r=eyJrIjoiYmUwMGVmZWUtNGM4NC00ZTQ5LWIyNzMtZTVjMmY3MmJhNTQzIiwidCI6ImNiYzJjMzgxLTJmMmUtNGQ5My05MWQxLTUwNmM5MzE2YWNlNyIsImMiOjR9&pageName=d7930b4b023a15557dd0" frameborder="0" allowFullScreen="true"></iframe>
  
    </div>
</div>
@endsection
