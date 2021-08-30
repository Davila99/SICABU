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
    <label for="estudiante">Estudiante:</label><br>
    <select class="form-control @error('user_id') is-invalid @enderror"
     name="estudiante_id"
     id="estudiante">

     <option value="" selected disabled>--Seleccione--</option>
     @foreach ($estudiantes as $estudiante )
        <option value="{{$estudiante->id }}"
            {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }}
            >{{ $estudiante->nombre}}</option>
     @endforeach
</div>

<div class="form-group">
    <label for="objetivo">Objetivo de la salida:</label><br>
    <input type="text" class="form-control" id="objetivo" name="objetivo"
        value="{{ isset($datos->objetivo) ? $datos->objetivo : old('objetivo')}}"><br>
</div>
<div class="form-group">
    <label for="fecha_salida">Fecha Salida:</label><br>
    <input type="date" class="form-control" id="fecha_salida" name="fecha_salida"
        value="{{ isset($datos->fecha_salida) ? $datos->fecha_salida : old('fecha_salida') }}"><br>
</div>
<div class="form-group">
    <label for="hora_salida">Hora Salida:</label><br>
    <input type="time" class="form-control" id="hora_salida" name="hora_salida"
        value="{{ isset($datos->hora_salida) ? $datos->hora_salida : old('hora_salida') }}"><br>
</div>
<div class="form-group">
    <label for="fecha_entrada">Fecha Entrada:</label><br>
    <input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada"
        value="{{ isset($datos->fecha_entrada) ? $datos->fecha_entrada : old('fecha_entrada') }}"><br>
</div>
<div class="form-group">
    <label for="hora_entrada">Hora Entrada:</label><br>
    <input type="time" class="form-control" id="hora_entrada" name="hora_entrada"
        value="{{ isset($datos->hora_entrada) ? $datos->hora_entrada : old('hora_entrada') }}"><br>
</div>


<div class="form-group">
    <label for="user">Autorizado por:</label><br>
    <select class="form-control @error('user_id') is-invalid @enderror"
     name="user_id"
     id="user">

     <option value="" selected disabled>--Seleccione--</option>
     @foreach ($users as $user )
        <option value="{{$user->id }}"
            {{ old('user_id') == $user->id ? 'selected' : '' }}
            >{{ $user->name}}</option>
     @endforeach
</div>

<input type="submit" value="Guardar" class="btn btn-success">
<button type="button" class="btn btn-secondary"><a href="{{ url('permiso/') }}"> Regresar </a></button>
