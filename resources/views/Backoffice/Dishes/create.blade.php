@extends('backoffice.layout.app')

@section('breadcrumb')
    @php
        $unicodeCode = '&#x' . dechex(mt_rand(0x16a0, 0x16ff)) . ';';
    @endphp

    <nav style="--bs-breadcrumb-divider: '{!! $unicodeCode !!}';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('backoffice.landingpage') }}">Inicio</a></li>

            @if (isset($dish))
                <li class="breadcrumb-item"><a href="{{ route('backoffice.dishes.index') }}">Platos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $dish->id }}</li>
            @else
                <li class="breadcrumb-item active" aria-current="page">Agregar</li>
            @endif
        </ol>
    </nav>
@endsection



@section('title')
    Formulario de Platos
@endsection

@section('content')
    <div class="container my-5">
        <div class="card rounded-4 shadow bg-body-secondary">
            <form method="POST"
                action="{{ isset($dish) ? '/backoffice/dishes/create/' . $dish->id : '/backoffice/dishes/create' }}"
                class="card-body" enctype="multipart/form-data">
                @csrf
                @if (isset($dish))
                    <input type="hidden" name="id" value="{{ $dish->id }}">
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ isset($dish) ? $dish->name : '' }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ isset($dish) ? $dish->description : '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoría</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">Seleccione una categoría</option>
                        <option @if (isset($dish) && $dish->category_id == 1) selected @endif value="1">Entrada</option>
                        <option @if (isset($dish) && $dish->category_id == 2) selected @endif value="2">Plato Principal</option>
                        <option @if (isset($dish) && $dish->category_id == 3) selected @endif value="3">Acompañamiento</option>
                        <option @if (isset($dish) && $dish->category_id == 4) selected @endif value="4">Postre</option>
                        <option @if (isset($dish) && $dish->category_id == 5) selected @endif value="5">Bebida</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01"
                        value="{{ isset($dish) ? $dish->price : '' }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image"
                        value="{{ isset($dish) ? $dish->image : '' }}">
                </div>
                <div class="mb-3">
                    <label for="image_alt" class="form-label">Descripción de la imagen</label>
                    <input type="text" class="form-control" id="image_alt" name="image_alt"
                        value="{{ isset($dish) ? $dish->image_alt : '' }}">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_available" name="is_available"
                        @if (isset($dish) && $dish->is_available) checked @endif>
                    <label class="form-check-label" for="is_available">Disponible</label>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
