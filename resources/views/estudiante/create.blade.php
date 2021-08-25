@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Estudiante</h1>
    <form action="{{ url('/estudiante') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('estudiante.form')

</form>
</div>
@endsection
