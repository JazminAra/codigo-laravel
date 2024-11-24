@extends('layout')

@section('content')
    <td style="background-color: white;">
        <h2>Personas</h2>
    <table class="table">
        <tr>
            @if ($personas)
                @foreach ($personas as $persona)
                    <td style="background-color: white;">
                        <a href="{{ route('personas.show', ['nPerCodigo' => $persona->nPerCodigo]) }}">{{ $persona->cPerNombre }} {{ $persona->cPerApellido }}</a>
                    </td>
                @endforeach
                
            @else
                <td colspan="4">No existen personas</td>
            @endif
            
        </tr>
        <tr>
            <td colspan="4">
                {{$personas->links('pagination::bootstrap-4')}}
            </td>
        </tr>
        
    </table>
    </td>
@endsection

