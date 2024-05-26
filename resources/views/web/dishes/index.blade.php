<!DOCTYPE html>
<html lang="es">
  @include('web.partials.head')
<body class="bg-secondary">
  @include('web.partials.nav')
  <main class="container mb-3">
    <h1 class="text-center my-5">Menú del Restaurante</h1>
    <ul class="list-group">
      <div class="row">
        <li class="col-md-6 list-group-item border rounded p-3">
          <div class="row">
            <div class="col-md-3">
              <img src="https://via.placeholder.com/200" alt="Producto 1" class="img-fluid">
            </div>
            <div class="col-md-9">
              <h2>Nombre del Producto 1</h2>
              <p>Descripción breve del producto 1.</p>
              <p><strong>Precio:</strong> $10.00</p>
              <a href="{{ route('web.dishes.show', ['id'=>8]) }}" class="btn btn-primary">Ver Detalles</a>
            </div>
          </div>
        </li>
        <li class="col-md-6 list-group-item border rounded p-3">
          <div class="row">
            <div class="col-md-3">
              <img src="https://via.placeholder.com/200" alt="Producto 2" class="img-fluid">
            </div>
            <div class="col-md-9">
              <h2>Nombre del Producto 2</h2>
              <p>Descripción breve del producto 2.</p>
              <p><strong>Precio:</strong> $12.00</p>
              <button class="btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </li>
      </div>
      <div class="row">
        <li class="col-md-6 list-group-item border rounded p-3">
          <div class="row">
            <div class="col-md-3">
              <img src="https://via.placeholder.com/200" alt="Producto 3" class="img-fluid">
            </div>
            <div class="col-md-9">
              <h2>Nombre del Producto 3</h2>
              <p>Descripción breve del producto 3.</p>
              <p><strong>Precio:</strong> $8.00</p>
              <button class="btn btn-primary">Agregar al carrito</button>
            </div>
          </div>
        </li>
      </div>
    </ul>
  </main>
@include('web.partials.footer')
</body>
</html>
