@extends('layout')

@section('title', 'Editar Servicio')

@section('content')
<table cellpadding='3' cellspacing='5'>
    <tr>
        @auth
        <img src="/storage/{{ $servicio->image }}" alt="{{ $servicio->titulo }}" width="300" height="100">
        <th colspan="4">Editar Servicio</th>
        @endauth
    </tr>
    @include('partials.validation-errors')
    <form action="{{ route('servicios.update', $servicio) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        @include('partials.form', ['btnText' => 'Actualizar'])
    </form>
</table>
@endsection

