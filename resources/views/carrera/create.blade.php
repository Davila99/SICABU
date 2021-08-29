@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Estudiante</h1>
    <form action="{{ url('/carrera') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('carrera.form')

</form>
</div>
@endsection
