@include('layouts.app')

<div class="container">
    <div class="card">
        <div class="card-header">
            Detalles del proveedor
        </div>
        <div class="card-body">
            <h5 class="card-title">Nombre: {{ $provider->name }}</h5>
            <p class="card-text"><strong>Compañia:</strong> {{ $provider->company_name }}</p>
            <p class="card-text"><strong>Telefono:</strong> {{ $provider->phone }}</p>
        </div>
    </div>
</div>
