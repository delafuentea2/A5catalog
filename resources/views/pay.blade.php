@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pedido Confirmado</h1>
        <p>Tu pedido ha sido confirmado y está en proceso de preparación.</p>
        <p>¡Gracias por tu compra!</p>

        <a href="{{ route('productos') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
