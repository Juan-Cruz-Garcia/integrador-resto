<!DOCTYPE html>
<html lang="es">

<head>
    @include('backoffice.partials.head')
</head>

<body class="bg-secondary">
    @include('backoffice.partials.nav')

    <main class="container my-5">
        <h1 class="mb-4 text-center">Formulario de Platos</h1>
        <div class="card rounded-4 shadow bg-body-secondary">
            <form method="POST" action="/backoffice/dishes/create" class="card-body">
                @csrf
                @if (isset($dish))
                    <input type="hidden" name="id" value="{{ $dish->id }}">
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ isset($dish) ? $dish->name : '' }}">
                </div>
                <div class-="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ isset($dish) ? $dish->description : '' }}</textarea>
                  </div>


                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoría</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">Seleccione una categoría</option>
                        <option @selected($dish->category_id == 1) value="1">Entrada</option>
                        <option @selected($dish->category_id == 2) value="2">Plato Principal</option>
                        <option @selected($dish->category_id == 3) value="3">Acompañamiento</option>
                        <option @selected($dish->category_id == 4) value="4">Postre</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ isset($dish) ? $dish->price : '' }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">URL de la Imagen</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ isset($dish) ? $dish->image : '' }}">
                </div>
                <div class="mb-3">
                    <label for="image_alt" class="form-label">Descripción de la imagen</label>
                    <input type="text" class="form-control" id="image_alt" name="image_alt" value="{{ isset($dish) ? $dish->image_alt : '' }}">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_available" name="is_available" checked>
                    <label class="form-check-label" for="is_available">Disponible</label>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </main>

    @include('backoffice.partials.footer')
</body>

</html>
