@extends('layout')

@section('title', 'Home')

@section('content')
<tr>
    <td colspan="4">Home</td>
</tr>
<tr>
    <td colspan="4">
    @auth
        {{auth()->user()->name}}
    @endauth
    </td>
</tr>
@endsection