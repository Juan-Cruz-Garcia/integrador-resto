@extends('web.layout.app')
@section('title')
    El Refugio del Pecador
@endsection
@section('custom_title')
    <!-- Hero Section -->
    <section class="d-flex align-items-center text-center bg-image"
        style="background-image: url('/storage/fondo.jpg'); background-repeat: no-repeat; background-size: cover; height: 100vh;">
        <div class="container">
            <h1 class="display-4 primary">Bienvenido al Refugio del Pecador</h1>
            <p class="lead primary">Adéntrate en nuestra taberna, aventurero, y descubre los secretos que aguardan.</p>
            <a href="{{ route('web.dishes.index') }}" class="btn btn-primary btn-lg mx-2">Explora</a>        </div>
    </section>
@endsection


@section('content')
<!-- prductos destacados -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row"data-bs-theme="dark">
            <h2>Los recomendados Pipin Mantelargo</h2>
            @foreach ($randomDishes as $dish)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/storage/{{ $dish?->image?->src }}" alt={{ $dish?->image?->image_alt }} class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title overflow-hidden text-truncate">{{ $dish->name }}</h5>
                            <p class="card-text overflow-hidden text-truncate">{{ $dish->description }}</p>
                            <p class="card-text"><strong>${{ $dish->price }}</strong></p>
                            <a href="#" class="btn btn-primary">Comprar</a>
                            <div class="card-text-full d-none">{{ $dish->description }}</div>
                            <div class="card-title-full d-none">{{ $dish->name }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


    <!-- testimonios -->
    <section class="py-5 bg-light">
        <div class="container"data-bs-theme="dark">
            <div class="text-center mb-5">
                <h2>Testimonios de Aventureros</h2>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"Este lugar es increíble, sus pociones me salvaron en muchas ocasiones."
                            </p>
                            <footer class="blockquote-footer">John el Guerrero</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"La espada encantada es una obra maestra, jamás había visto algo igual."
                            </p>
                            <footer class="blockquote-footer">Jane la Hechicera</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"Las capas de invisibilidad me ayudaron a superar muchas dificultades."</p>
                            <footer class="blockquote-footer">Alice la Ladrona</footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
