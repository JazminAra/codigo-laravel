@extends('layout')

@section('title', 'Contacto')

@section('content')
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="2">CONTACTO</th>
            </tr>
        </thead>
        <tbody>
            @if(session('estado-contacto'))
                 {{ session('estado-contacto') }}
            @else
                <form action="{{ route('contacto') }}" method="post">
                    @csrf
                    <tr>
                        <td scope="row">Nombre</td>
                        <td>
                            <input type="text" name="nombre" placeholder="Nombre" class="form-control" value="{{ old('nombre') }}">
                            <div class="text-danger">{{ $errors->first('nombre') }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Email</td>
                        <td>
                            <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Asunto</td>
                        <td>
                            <input type="text" name="asunto" placeholder="Asunto" class="form-control" value="{{ old('asunto') }}">
                            <div class="text-danger">{{ $errors->first('asunto') }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Mensaje</td>
                        <td>
                            <textarea name="mensaje" cols="15" rows="8" placeholder="Mensaje" class="form-control">{{ old('mensaje') }}</textarea>
                            <div class="text-danger">{{ $errors->first('mensaje') }}</div>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row" colspan="2" align="center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset" class="btn btn-primary">Cancelar</button>
                        </td>
                    </tr>
                </form>
            @endif
        </tbody>
    </table>
@endsection
