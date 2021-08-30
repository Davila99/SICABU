@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Ingresar Actividad</h1>
    <form action="{{ url('/actividad') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('actividad.form')

</form>
</div>
@endsection
