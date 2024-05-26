<!DOCTYPE html>
<html lang="es">
@include('backoffice.partials.head')
<body class="bg-secondary">
@include('backoffice.partials.nav')
<main class="container">
    <h1 class="text-center my-5">Lista de Productos - Administrador</h1>
    <button class="btn btn-success mb-3">Agregar Producto</button>
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">Imagen</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripción</th>
          <th scope="col">Categoría</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="align-middle"><img src="https://via.placeholder.com/100" alt="Producto" class="img-thumbnail"></td>
          <td class="align-middle">Nombre del Producto</td>
          <td class="align-middle">Descripción breve del producto.</td>
          <td class="align-middle">Categoría del Producto</td>
          <td class="align-middle">
            <a href="#" class="btn btn-primary btn-sm">Editar</a>
            <button class="btn btn-danger btn-sm">Borrar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </main>
@include('backoffice.partials.footer')
</body>
</html>
