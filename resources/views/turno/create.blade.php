@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Turno</h1>
    <form action="{{ url('/turno') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('turno.form')

</form>
</div>
@endsection
