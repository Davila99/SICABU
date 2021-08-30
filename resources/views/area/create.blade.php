@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Area</h1>
    <form action="{{ url('/area') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('area.form')

</form>
</div>
@endsection
