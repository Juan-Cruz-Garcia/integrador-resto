<!DOCTYPE html>
<html lang="es">
    @include('web.partials.head')
    <body class="bg-secondary">
      @include('web.partials.nav')
    <main class="container">
        <div class="row">
            <h1>Plato N° {{ $id }}</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum error doloremque, labore minima ea totam
                laboriosam ut nesciunt quam? Praesentium, a exercitationem vitae iure omnis labore? Aliquid molestias
                quas voluptatem, accusantium rerum sit saepe. Voluptatibus vel, non aperiam delectus ex eos optio
                laboriosam et. Eum fuga id minus incidunt repellendus.</p>
                <p><a href={{  route('web.dishes.index') }}>volver</a></p>
                
            </div>
    </main>
    @include('web.partials.footer')
</body>
</html>

