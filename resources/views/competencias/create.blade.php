    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <div class="container py-4">
            <h2>Registrar COmpetencia</h2>

            <form action="{{ url('competencias') }}" method="post">

                @csrf
                <div class="md-3 row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre de la competencia:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="nombre"  id="nombre" value="{{old('nombre')}}" required>
                    </div>
                <a href="{{ url('competencias') }}"  class="btn btn-secondary">Regresar</a>
                <button type="sumit" class="btn btn-success">Guardar</button>
                </div>
        </form>
        </div>

    </body>
    </html>