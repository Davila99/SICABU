@extends('layouts.app')

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
        <a href="{{ url('carrera/create') }}" class="btn btn-success"> Nuevo estudiante </a>
        <br>
        <br>
        <table class="table table-dark">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($estudiantes as $estudiante)

                    <tr>
                        <td>{{ $estudiante->nombre }}</td>
                        <td>{{ $estudiante->apellido }}</td>
                        <td>{{ $estudiante->correo }}</td>
                        <td>{{ $estudiante->telefono }}</td>
                        <td>{{ $estudiante->carrera->nombre }}</td>
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
