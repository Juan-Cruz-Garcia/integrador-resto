<!DOCTYPE html>
<html lang="es">
  @include('web.partials.head')
<body class="bg-secondary">
  @include('web.partials.nav')
  <main class="container my-5 "style="min-height: 50vh">
    @if ($dish)
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-5">
            <img src="{{ $dish->image }}?={{ $dish->id }}" class="img-fluid rounded-start " alt="{{ $dish->image_alt }}">
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
      <p class="text-center">Plato no encontrado.</p>
    @endif
  </main>
  @include('web.partials.footer')
</body>
</html>
