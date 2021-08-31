@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Estudiante</h1>
        <form action="{{ url('estudiante/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('permiso.form')
        </form>
    </div>

@endsection
