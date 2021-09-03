@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Permiso</h1>
    <form action="{{ url('/permiso') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('permiso.form')

</form>
</div>
@endsection
