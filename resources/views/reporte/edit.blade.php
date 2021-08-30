@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Editar Reporte</h1>
        <form action="{{ url('reporte/' . $datos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            @include('reporte.form')
        </form>
    </div>

@endsection
