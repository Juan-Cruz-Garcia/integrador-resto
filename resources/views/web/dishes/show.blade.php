@extends('web.layout.app')

@section('breadcrumb')
    @if ($dish && $dish->is_available==1)
        @php
            $unicodeCode = '&#x' . dechex(mt_rand(0x16a0, 0x16ff)) . ';';
        @endphp
        <nav style="--bs-breadcrumb-divider: '{!! $unicodeCode !!}';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('web.landingpage') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('web.dishes.index') }}">Menú del Restaurante</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $dish->name }}</li>
            </ol>
        </nav>
    @endif
@endsection

@section('content')
    <div class="container my-5">
        @if ($dish && $dish->is_available==1)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="{{ $dish->image }}?={{ $dish->id }}" class="img-fluid rounded-start"
                            alt="{{ $dish->image_alt }}">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p class="card-text text-muted">Precio: ${{ $dish->price }}</p>
                            <div class="d-flex justify-content-between mt-auto">
                                <a href="#" class="btn btn-primary">Agregar al carrito</a>
                                <a href="{{ route('web.dishes.index') }}" class="btn btn-secondary">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p class="text-center">Plato no disponible</p>
        @endif
    </div>
@endsection
