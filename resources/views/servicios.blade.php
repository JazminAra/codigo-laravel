@extends('layout')

@section('content')
    <tr>
        <td>
        <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
        @isset($category)
           <div>
                <h1 class="display-4 mb-0">{{ $category->name }}</h1>
                <a href="{{ route('servicios.index') }}">Regresar a Servicios</a>
            </div>
        @else
            <h1 class="display-4 mb-0">Servicios</h1>
        @endisset
        @auth
        <td colspan="5" style="background-color: white;">
            <a class="btn btn-primary" href="{{ route('servicios.create') }}">Nuevo Servicio</a></td>
        @endauth
        </td>
    </tr>
    <tr>
    <td colspan="5">
    <p class="Lead text-secondary">Listado de Servicio</p>
        <div class="d-flex flex-wrap justify-content-between align-items-start">
        @forelse($servicios as $servicio)
            <div class="card border-e shadow-sm mt-4 mx-auto" style="width: 18rem"> 
                @if($servicio->image)
                   <img src="/storage/{{ $servicio->image }}" alt="{{ $servicio->titulo }}" width="285" height="200">
                @endif
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('servicios.show', $servicio) }}">{{ $servicio->titulo }}</a>
                    </h5>
                    <h6 class="card-subtitle">{{ $servicio->created_at->format('d/m/Y')}}</h6>
                    <p class="card-text text-truncate">{{ $servicio->descripcion}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('servicios.show', $servicio) }}"
                            class="btn btn-primary btn-sm"
                            >Ver más...</a>
                            @if($servicio->category_id)
                                <a href="{{ route('categories.show', $servicio->category) }}" class="badge badge-secondary">{{  $servicio->category->name}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        No existe ningun servicio
                    </div>
                </div>
            @endforelse
        </div>
        <div class="mt-4">
            {{$servicios->links('pagination::bootstrap-4')}}
        </div>
    </td>
    </tr>
@endsection
