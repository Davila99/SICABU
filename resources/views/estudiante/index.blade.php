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
        <a href="{{ url('estudiante/create') }}" class="btn btn-success"> Nuevo estudiante </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($estudiantes as $estudiante)

                    <tr>
                        <td><img src="{{ asset('storage') . '/' . $estudiante->foto }}" width="100"
                                class="rounded float-start" alt=""></td>
                        <td>{{ $estudiante->nombre }}</td>
                        <td>{{ $estudiante->apellido }}</td>
                        <td>{{ $estudiante->correo }}</td>
                        <td>{{ $estudiante->telefono }}</td>
                        <td>{{ $estudiante->carrera->descripcion }}</td>
                        <td><a href="{{ url('/estudiante/' . $estudiante->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/estudiante/' . $estudiante->id) }}" method="post" class="d-inline">
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
        {!! $estudiantes->links() !!}
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
