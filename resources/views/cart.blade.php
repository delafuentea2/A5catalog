@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Esta es tu lista de la compra, {{ Auth::user()->name }}</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $cart->product_name }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>{{ $cart->product_price }}</td>
                    </tr>
                @endforeach
                <tr><td colspan='3'><h2>Total de la compra: {{ $total }}</h2></td></tr>
            </tbody>
        </table>   
    </div>
        

        <a href="{{ route('pay') }}" class="btn btn-primary">PAGAR</a>
    </div>
@endsection
