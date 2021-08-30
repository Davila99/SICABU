@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

{{--  @extends('layouts.app')  --}}

@section('content')
    <div class="container">

        @if (Session::has('mensaje'))
            <div class="alert alert-success" role="alert" class="text-center">
                {{ Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hiden="true">&times;</span>
                </button>
            </div>

        @endif
        <a href="{{ url('permiso/create') }}" class="btn btn-success"> Nuevo estudiante </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Estudiante</th>
                    <th>Objetivo de Salida</th>
                    <th>Fecha Salida</th>
                    <th>Hora Salida</th>
                    <th>Fecha Entrada</th>
                    <th>Hora Entrada</th>
                    <th>Autorizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($permisos as $permiso)

                        <td>{{ $permiso->estudiante->nombre}}</td>
                        <td>{{ $permiso->objetivo }}</td>
                        <td>{{ $permiso->fecha_salida }}</td>
                        <td>{{ $permiso->hora_salida }}</td>
                        <td>{{ $permiso->fecha_entrada }}</td>
                        <td>{{ $permiso->hora_entrada }}</td>
                        <td>{{ $permiso->user->name }}</td>
                        <td><a href="{{ url('/permiso/' . $permiso->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/permiso/' . $permiso->id) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" onclick="return confirm('Estas seguro de eliminar este registro?')"
                                    class="btn btn-danger" value="eliminar">
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $permisos->links() !!}
    </div>

@endsection
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
