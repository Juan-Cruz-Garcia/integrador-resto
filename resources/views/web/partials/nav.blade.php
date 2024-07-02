<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('web.landingpage') }}">El Refugio del Pecador</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('web.landingpage') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web.dishes.index') }}">Platos</a>
                </li>
                <!-- Menú desplegable Categorías -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu" data-bs-theme="dark" aria-labelledby="navbarDropdownCategories">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('web.dishes.categories', ['category' => $category->id]) }}">{{ $category->value }}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <!-- Menú desplegable usuario -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ session()->has('usuario') ? session('usuario') : 'Aventurero' }}
                    </a>
                    <ul class="dropdown-menu" data-bs-theme="dark" aria-labelledby="navbarDropdownCategories">
                        @auth
                            <form action="{{ route('web.cart.logout') }}" method="POST">
                                @csrf
                                <li><button type="submit" class="dropdown-item">Cerrar sesion</button></li>
                            </form>
                            <li><a class="dropdown-item" href="{{ route('web.cart.checkout') }}">Carrito</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('home') }}">Iniciar sesison</a></li>
                            <li><a class="dropdown-item" href="">Registrarse</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
