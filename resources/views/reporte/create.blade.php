@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Reporte</h1>
    <form action="{{ url('/reporte') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('reporte.form')

</form>
</div>
@endsection
