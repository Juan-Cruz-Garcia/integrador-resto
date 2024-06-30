<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('web.landingpage') }}">El Refugio del Pecador</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <!-- Aquí puedes iterar sobre las categorías disponibles -->
              @foreach ($categories as $category)
              <li><a class="dropdown-item" href="{{ route('web.dishes.index', ['category' => $category->id]) }}">{{ $category->value }}</a></li>
          @endforeach
          
          </ul>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Aventurero/a</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contacto</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
