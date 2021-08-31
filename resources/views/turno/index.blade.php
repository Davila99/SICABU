@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

{{-- @extends('layouts.app') --}}

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
        <br>
        <a href="{{ url('turno/create') }}" class="btn btn-success"> Nuevo Turno</a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Turnos</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($turnos as $turno)

                    <tr>
                        <td>{{ $turno->descripcion }}</td>
                        <td><a href="{{ url('/turno/' . $turno->id . '/edit') }}" class="btn btn-info">
                                Editar </a>|
                            <form action="{{ url('/turno/' . $turno->id) }}" method="post" class="d-inline">
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
        {!! $turnos->links() !!}
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
