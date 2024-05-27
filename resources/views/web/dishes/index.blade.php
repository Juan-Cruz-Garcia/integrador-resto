<!DOCTYPE html>
<html lang="es">
  @include('web.partials.head')
<body class="bg-secondary">
  @include('web.partials.nav')
  <main class="container mb-3">
    <h1 class="text-center my-5">Menú del Restaurante</h1>
    <ul class="list-group">
      @if ($dishes->count() > 0)
          @foreach ($dishes as $dish)
          <li class="col-md-12 list-group-item border rounded p-3 m-1">
            <div class="row">
              <div class="col-md-3">
                <img src="{{ $dish->image }}?={{ $dish->id }}" alt="{{ $dish->image_alt }}" class="img-fluid">
              </div>
              <div class="col-md-9">
                <h2>{{ $dish->name }}</h2>
                <p>{{ $dish->description }}</p>
                <p><strong>${{ $dish->price }}</strong></p>
                <a href="{{ route('web.dishes.show', $dish->id) }}" class="btn btn-primary">Ver Detalles</a>
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
    
        <p class="text-muted text-center mt-2">Mostrando página {{ $dishes->currentPage() }} de {{ $dishes->lastPage() }}</p>
    </ul>
  </main>
@include('web.partials.footer')
</body>
</html>
