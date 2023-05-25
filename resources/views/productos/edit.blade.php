@include('layouts.app')
<form action="{{ route('productos.update', $producto->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ $producto->name }}" required>
    </div>
    <div>
        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" min="0" step="0.01" value="{{ $producto->price }}" required>
    </div>
    <div>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required>{{ $producto->description }}</textarea>
    </div>
    <div>
        <label for="category">Categoría:</label>
        <select name="category" id="category" required>
            <option value="">Selecciona una categoría</option>
            <option value="Electrónica" {{ $producto->category == 'Electrónica' ? 'selected' : '' }}>Electrónica</option>
            <option value="Ropa" {{ $producto->category == 'Ropa' ? 'selected' : '' }}>Ropa</option>
            <option value="Hogar" {{ $producto->category == 'Hogar' ? 'selected' : '' }}>Hogar</option>
            <option value="Alimentos y bebidas" {{ $producto->category == 'Alimentos y bebidas' ? 'selected' : '' }}>Alimentos y bebidas</option>
            <option value="Muebles" {{ $producto->category == 'Muebles' ? 'selected' : '' }}>Muebles</option>
            <option value="Deportes" {{ $producto->category == 'Deportes' ? 'selected' : '' }}>Deportes</option>
            <option value="Juguetes" {{ $producto->category == 'Juguetes' ? 'selected' : '' }}>Juguetes</option>
            <option value="Belleza y cuidado personal" {{ $producto->category == 'Belleza y cuidado personal' ? 'selected' : '' }}>Belleza y cuidado personal</option>
        </select>
    </div>
    <div>
        <button type="submit">Actualizar producto</button>
    </div>
</form>
