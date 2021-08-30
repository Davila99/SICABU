@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Turno</h1>
        <form action="{{ url('area/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('area.form')
        </form>
    </div>
@endsection
