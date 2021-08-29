@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Carrera</h1>
    <form action="{{ url('/carrera') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('carrera.form')

</form>
</div>
@endsection
