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
        <h2>Registrar Profesor</h2>

        <form action="{{ url('instructores/'.$instructor->id) }}" method="post">
            @method("PUT")
            @csrf

             <div class="md-3 row">
                  <label for="documento" class="col-sm-2 col-form-label">Documento del profesor:</label>
                  <div class="col-sm-5">
                      <input type="number" class="form-control"  name="documento"  id="documento" value="{{$instructor->documento}}" required>
                 </div>
            </div>
            <div class="md-3 row">
                  <label for="nombre" class="col-sm-2 col-form-label">Nombre del profesor:</label>
                <div class="col-sm-5">
                      <input type="text" class="form-control"  name="nombre"  id="nombre" value="{{$instructor->nombre}}" required>
                </div>
            </div>
            <div class="md-3 row">
                  <label for="apellido" class="col-sm-2 col-form-label">Apellido del profesor:</label>
                <div class="col-sm-5">
                      <input type="text" class="form-control"  name="apellido"  id="apellido" value="{{$instructor->apellido}}" required>
                </div>
            </div>
            <div class="md-3 row">
                  <label for="correo" class="col-sm-2 col-form-label">Correo del profesor:</label>
                  <div class="col-sm-5">
                      <input type="email" class="form-control"  name="correo"  id="correo" value="{{$instructor->correo}}" required>
                  </div>
            </div>
            <div class="md-3 row">
                  <label for="telefono" class="col-sm-2 col-form-label">Telefono del profesor:</label>
                  <div class="col-sm-5">
                      <input type="number" class="form-control"  name="telefono"  id="telefono" value="{{$instructor->telefono}}" required>
                  </div>
            </div>
              <a href="{{ url('instructores') }}"  class="btn btn-secondary">Regresar</a>
              <button type="sumit" class="btn btn-success">Guardar</button>
             </div>
    </form>
    </div>
</body>
</html>