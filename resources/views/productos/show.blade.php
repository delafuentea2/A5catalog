@include('layouts.app')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            {{ $producto->name }}
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="https://picsum.photos/200/300?random" alt="{{ $producto->name }}" class="img-fluid">
            </div>
            <div class="col-md-8">
                <p><strong>Precio:</strong> ${{ $producto->price }}</p>
                <p><strong>Categoría:</strong> {{ $producto->category }}</p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#descripcion" aria-expanded="false" aria-controls="descripcion">
                    Ver descripción
                </button>
            </div>
        </div>
        <div class="collapse" id="descripcion">
            <div class="mt-3">
                <p>{{ $producto->description }}</p>
            </div>
        </div>
    </div>
</div>
