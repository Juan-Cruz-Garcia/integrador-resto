@extends('web.layout.app')

@section('breadcrumb')
    @php
        $unicodeCode = '&#x' . dechex(mt_rand(0x16a0, 0x16ff)) . ';';
    @endphp
    <nav style="--bs-breadcrumb-divider: '{!! $unicodeCode !!}';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('web.landingpage') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Menú del Restaurante</li>
        </ol>
    </nav>
@endsection

@section('title', 'Menú del Restaurante')

@section('content')
    <div class="container mb-3">
        <div class="mb-3" style="text-align: right;">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="orderDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Ordenar por
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="orderDropdown"data-bs-theme="dark">
                    <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['filtro' => 'desc']) }}">Precio de mayor
                            a menor</a></li>
                    <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['filtro' => 'asc']) }}">Precio de menor a
                            mayor</a></li>
                </ul>
            </div>
        </div>

        <div class="container mb-3">
            <ul class="list-group"data-bs-theme="dark">
                @if ($dishes->count() > 0)
                    @foreach ($dishes as $dish)
                        <li class="col-md-12 list-group-item border rounded p-3 m-1">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="/storage/{{ $dish->image }}?={{ $dish->id }}"
                                        alt="{{ $dish->image_alt }}" class="img-fluid">
                                </div>
                                <div class="col-md-9">
                                    <h2>{{ $dish->name }}</h2>
                                    <p>{{ $dish->description }}</p>
                                    <p><strong>${{ $dish->price }}</strong></p>
                                    <a href="{{ route('web.dishes.show', $dish->id) }}" class="btn btn-primary">Ver
                                        Detalles</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @else
                    <p class="text-center">No se encontraron productos.</p>
                @endif

                <div class="pagination justify-content-center mt-4">
                    <ul class="pagination">
                        @if ($dishes->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $dishes->previousPageUrl() }}">«</a>
                            </li>
                        @endif

                        @for ($i = 1; $i <= $dishes->lastPage(); $i++)
                            <li class="page-item {{ $i === $dishes->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $dishes->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($dishes->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $dishes->nextPageUrl() }}">»</a>
                            </li>
                        @endif
                    </ul>
                </div>

                <p class="text-muted text-center mt-2">Mostrando página {{ $dishes->currentPage() }} de
                    {{ $dishes->lastPage() }}</p>
            </ul>
        </div>
    </div>

@endsection
