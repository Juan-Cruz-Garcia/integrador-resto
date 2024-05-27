<!DOCTYPE html>
<html lang="es">
  @include('backoffice.partials.head')
<body class="bg-secondary">
  @include('backoffice.partials.nav')
  <main class="container">
    <h1 class="text-center my-5">Lista de Productos - Administrador</h1>
    <table class="table table-striped table-bordered rounded-5">
      <thead class="table-dark">
        <tr>
          <th scope="col">Imagen</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Categoría</th>
          <th scope="col">Precio</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @if ($dishes->count() > 0)
          @foreach ($dishes as $dish)
            <tr>
              <td class="align-middle"><img src="{{ $dish->image }}?={{ $dish->id }}" alt="Producto" class="img-thumbnail" style="max-width: 200px; max-height: 250px;"></td>
              <td class="align-middle">{{ $dish->name }}</td>
              <td class="align-middle">{{ $dish->description }}</td>
              <td class="align-middle">{{ $dish->category_id }}</td>
              <td class="align-middle">{{ $dish->price }}</td>
              <td class="align-middle">
                <a href="/backoffice/dishes/create/{{ $dish->id }}" class="btn btn-primary btn-sm">Editar</a>
                <button class="btn btn-danger btn-sm">Borrar</button>
              </td>
            </tr>
          @endforeach
        @else
          <p class="text-center">No se encontraron productos.</p>
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

    <p class="text-muted text-center mt-2">Mostrando página {{ $dishes->currentPage() }} de {{ $dishes->lastPage() }}</p>
  </main>
  @include('backoffice.partials.footer')
</body>
</html>
