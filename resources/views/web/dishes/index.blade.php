<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>restaurante</title>
</head>
<body>
    
    <main class="container">
        <div class="row">
            <h1>platos</h1>
            <col-md-12>
                <ul>
                    <li><a href="{{  route('web.dishes.show', ['id'=>1]) }}">milanesa con pure</a></li>
                    <li><a href="{{  route('web.dishes.show', ['id'=>2]) }}">pastel de papa</a></li>
                    <li><a href="{{  route('web.dishes.show', ['id'=>3]) }}">chorizo a la pomarola</a></li>
                    <li><a href="{{  route('web.dishes.show', ['id'=>4]) }}">tacos al pastor</a></li>
                    <li><a href="{{  route('web.dishes.show', ['id'=>5]) }}">ñoquis de papa</a></li>
                    <li><a href="{{  route('web.dishes.show', ['id'=>6]) }}">ñoquis de calabaza</a></li>
                    <li><a href="{{  route('web.dishes.show', ['id'=>7]) }}">empanadas</a></li>
                    <li><a href="{{  route('web.dishes.show', ['id'=>8]) }}">revuelto gramajo</a></li>
                </ul>
            </col-md-12>
        </div>
    </main>
</body>
</html>