@include('layouts.app')

<form action="{{ route('providers.update', $provider->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ $provider->name }}" required>
    </div>
    <div>
        <label for="company_name">Precio:</label>
        <input type="text" name="company_name" id="company_name" value="{{ $provider->company_name }}" required>
    </div>
    <div>
        <label for="phone">Categoría:</label>
        <input type="tel" name="phone" id="phone" value="{{ $provider->phone }}" required>
    </div>
    <button type="submit">Guardar cambios</button>
</form>
