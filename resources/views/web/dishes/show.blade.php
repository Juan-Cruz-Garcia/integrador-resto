@extends('web.layout.app')

@section('breadcrumb')
    @if ($dish && $dish->is_available == 1)
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
    <div class="container my-5"data-bs-theme="dark">
        @if ($dish && $dish->is_available == 1)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="/storage/{{ $dish?->image?->src }}" class="img-fluid rounded-start"
                            alt="{{ $dish->image_alt }}">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p class="card-text text-muted">Precio: ${{ $dish->price }}</p>
                            <div class="d-flex justify-content-between mt-auto">
                                <div class="d-inline-block">
                                    <form action="{{ route('web.cart.add', $dish->id) }}" method="POST" id="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $dish->id }}"> 
                                        <button type="submit" class="btn btn-primary">Agregar al carrito</button>
                                    </form>
                                </div>
                                <div class="d-inline-block">
                                    @if(session()->has('cart') && array_key_exists($dish->id, session('cart')))
                                        <form action="{{ route('web.cart.remove', $dish->id) }}" method="POST" id="remove-from-cart-form">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $dish->id }}"> 
                                            <button type="submit" class="btn btn-danger">Quitar del carrito</button>
                                        </form>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ route('web.dishes.index') }}" class="btn btn-secondary">Volver</a>
                                </div>
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
