@extends('backoffice.layout.app')

@section('breadcrumb')
    @php
        $unicodeCode = '&#x' . dechex(mt_rand(0x16a0, 0x16ff)) . ';';
    @endphp
    <nav style="--bs-breadcrumb-divider: '{!! $unicodeCode !!}';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('backoffice.landingpage') }}">panel</a></li>
            <li class="breadcrumb-item active" aria-current="page">platos</li>
        </ol>
    </nav>
@endsection

@section('title')
    Lista de Productos - Administrador
@endsection

@section('content')
    @php
        $categoryNames = [
            1 => 'Entrada',
            2 => 'Plato Principal',
            3 => 'Acompañamiento',
            4 => 'Postre',
            5 => 'Bebida',
        ];
    @endphp
    <div class="container mt-5">
        <table class="table table-striped table-bordered rounded-5">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Disponible</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($dishes->count() > 0)
                    @foreach ($dishes as $dish)
                        <tr>
                            <td class="align-middle"><img src="/storage/{{ $dish?->image?->src }}" alt={{ $dish?->image?->image_alt }}
                                    class="img-thumbnail" style="max-width: 200px; max-height: 250px;"></td>
                            <td class="align-middle">{{ $dish->name }}</td>
                            <td class="align-middle">{{ $dish->description }}</td>
                            <td class="align-middle">
                                <div>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="orderDropdown"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $categoryNames[$dish->category_id] }} </button>
                                            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="orderDropdown">
                                                @foreach ($categoryNames as $categoryId => $categoryName)
                                                <li>
                                                    <form action="{{ route('backoffice.dishes.categories', $dish->id) }}" method="get">
                                                        @csrf
                                                        <input type="hidden" name="category" value="{{ $categoryId }}">
                                                        <button type="submit" class="dropdown-item">{{ $categoryName }}</button>
                                                    </form>
                                                </li>
                                            @endforeach
                                            </ul>
                                    </div>
                            </td>
                            <td class="align-middle">{{ $dish->is_available ? 'Sí' : 'No' }}</td>
                            <td class="align-middle">{{ $dish->price }}</td>
                            <td class="align-middle">
                                <a href="/backoffice/dishes/create/{{ $dish->id }}"
                                    class="btn btn-primary btn-sm">Editar</a>
                                <a href="{{ route('backoffice.dishes.available', $dish->id) }}"
                                    class="btn btn-sm {{ $dish->is_available ? 'btn-danger' : 'btn-success' }}">
                                    {{ $dish->is_available ? 'Desactivar' : 'Activar' }}
                                </a>
                                <button class="btn btn-danger btn-sm">Borrar</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">No se encontraron productos.</td>
                    </tr>
                @endif
            </tbody>
        </table>

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

        <p class="text-muted text-center mt-2">Mostrando página {{ $dishes->currentPage() }} de {{ $dishes->lastPage() }}
        </p>
    </div>
@endsection
