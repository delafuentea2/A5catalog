<!-- Vista de catálogo de productos -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://picsum.photos/200/300" alt="Imagen del producto">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->name }}</h5>
                            <p class="card-text">{{ $producto->description }}</p>
                            <a href="#" class="btn btn-primary">Al carro</a>
                            <<a href="#" class="btn btn-primary">{{ $producto->price }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
