@extends('web.layout.app')

@section('breadcrumb')
    @php
        $unicodeCode = '&#x' . dechex(mt_rand(0x16a0, 0x16ff)) . ';';
    @endphp
    <nav style="--bs-breadcrumb-divider: '{!! $unicodeCode !!}';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('web.landingpage') }}">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </nav>
@endsection

@section('title', 'Checkout')

@section('content')
    <div class="container my-5">
        @if (session()->has('cart') && count(session('cart')) > 0)
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="table-active">
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dishes as $dish)
                        <tr>
                            <td>{{ $dish->name }}</td>
                            <td>
                                <div class="d-grid gap-2 d-md-block">
                                    {{ $quantities[$dish->id] }}
                                    <form action="{{ route('web.cart.remove', ['id' => $dish->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-dark btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                            <td>${{ $dish->price }}</td>
                            <td>${{ $quantities[$dish->id] * $dish->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total:</th>
                        <th class="table-active">${{ $total }}</th>
                    </tr>
                </tfoot>
            </table>

            <div class="d-flex justify-content-between">
                <a href="{{ route('web.dishes.index') }}" class="btn btn-success">Seguir Comprando</a>
                <form action="{{ route('web.cart.checkout.buy') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Confirmar Pedido</button>
                </form>
            </div>
        @else
            <p class="text-center">Aún no tenés productos en tu changuito.</p>
        @endif
    </div>
@endsection
