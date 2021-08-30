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


<br>
<div class="form-group">
    <label for="descripcion">Descripcion de Reporte:</label><br>
    <input type="text" class="form-control" id="descripcion" name="descripcion"
        value="{{ isset($datos->descripcion) ? $datos->descripcion : old('descripcion') }}"><br>
</div>

<div class="form-group">
    <label for="fecha">Fecha:</label><br>
    <input type="date" class="form-control" id="fecha" name="fecha"
        value="{{ isset($datos->fecha) ? $datos->fecha : old('fecha') }}"><br>
</div>
<div class="form-group">
    <label for="estudiante">Estudiante:</label><br>
    <select class="form-control @error('estudiante_id') is-invalid @enderror"
     name="estudiante_id"
     id="estudiante">

     <option value="" selected disabled>--Seleccione--</option>
     @foreach ($estudiantes as $estudiante )
        <option value="{{$estudiante->id }}"
            {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }}
            >{{ $estudiante->nombre}}</option>
     @endforeach
</div>


<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('estudiante/') }}"> Regresar </a></button>
