{{--  <h1>{{ $titulo }} Estudiante</h1>  --}}

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">

    <label for="avatar">Foto:</label><br>
    @if (isset($datos->foto))
        <img src="{{ asset('storage') . '/' . $datos->foto }}" width="100" class="rounded float-start" alt="">
    @endif
</div>
<br>
<input type="file" id="foto" name="foto" value=""><br><br>
<div class="form-group">
    <label for="nombre">Nombre:</label><br>
    <input type="text" class="form-control" id="nombre" name="nombre"
        value="{{ isset($datos->nombre) ? $datos->nombre : old('nombre') }}"><br>
</div>
<div class="form-group">
    <label for="apellido">Apellido:</label><br>
    <input type="text" class="form-control" id="apellido" name="apellido"
        value="{{ isset($datos->apellido) ? $datos->apellido : old('apellido')}}"><br>
</div>
<div class="form-group">
    <label for="correo">Email:</label><br>
    <input type="email" class="form-control" id="correo" name="correo"
        value="{{ isset($datos->correo) ? $datos->correo : old('correo') }}"><br>
</div>
<div class="form-group">
    <label for="telefono">Telefono:</label><br>
    <input type="text" class="form-control" id="telefono" name="telefono"
        value="{{ isset($datos->telefono) ? $datos->telefono : old('telefono') }}"><br>
</div>

<div class="form-group">
    <label for="carrera">Carrera:</label><br>
    <select class="form-control @error('carrera_id') is-invalid @enderror"
     name="carrera_id"
     id="carrera">

     <option value="" selected disabled>--Seleccione--</option>
     @foreach ($carreras as $carrera )
        <option value="{{$carrera->id }}"
            {{ old('carrera_id') == $carrera->id ? 'selected' : '' }}
            >{{ $carrera->descripcion}}</option>
     @endforeach
</div>

<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('estudiante/') }}"> Regresar </a></button>
