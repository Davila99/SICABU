@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Carrera</h1>
        <form action="{{ url('actividad/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('actividad.form')
        </form>
    </div>
@endsection
