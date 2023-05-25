@include('layouts.app')

<style>
    .table-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .table-container h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .table-container table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-container th,
    .table-container td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    .table-container tbody tr:hover {
        background-color: #f5f5f5;
    }

    .table-container .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        user-select: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .table-container .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }

    .table-container .btn-primary:hover {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .table-container .btn-info {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .table-container .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .table-container .btn-danger {
        color: #fff;
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .table-container .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>

<div class="table-container">
    <h1>Listado de proveedores</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($providers as $provider)
            <tr>
                <td>{{ $provider->name }}</td>
                <td>{{ $provider->company_name }}</td>
                <td>{{ $provider->phone }}</td>
                <td>
                    <a href="{{ route('providers.show', $provider->id) }}" class="btn btn-primary">Ver</a>
                    <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-info">Editar</a>
                    <form action="{{ route('providers.destroy', $provider->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


