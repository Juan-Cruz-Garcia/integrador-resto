<!DOCTYPE html>
<html lang="es">
<head>
    @include('backoffice.partials.head')
</head>
<body class="bg-secondary">
    @include('backoffice.partials.nav')

    <main class="container mt-5" style="min-height: 80vh">
        <h1 class="text-center mb-5">Panel de Administración</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="{{ route('backoffice.dishes.index') }}" class="card card-body text-center text-decoration-none">
                    <img src="https://via.placeholder.com/200x100/2048" alt="acceso a lista" class="img-fluid">
                    <i class="fas fa-utensils fa-3x"></i>
                    <h2 class="h5 mt-3">Platos</h2>
                    <p class="mb-0">Gestiona el menú de tu restaurante.</p>
                </a>
            </div>
            <div class="col-md-4 mb-4">
                <a href="{{ route('backoffice.dishes.create') }}" class="card card-body text-center text-decoration-none">
                    <img src="https://via.placeholder.com/200x100/1024" alt="acceso a formulario" class="img-fluid">
                    <i class="fas fa-edit fa-3x"></i>
                    <h2 class="h5 mt-3">Agregar Platos</h2>
                    <p class="mb-0">Agregar nuevas recetas al menu de tu restaurante.</p>
                </a>
            </div>
        </div>
    </main>

    @include('backoffice.partials.footer')
</body>
</html>
