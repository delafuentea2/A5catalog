@include('layouts.app')
<form action="{{ route('productos.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" min="0" step="0.01" required>
    </div>
    <div>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required></textarea>
    </div>
    <div>
        <label for="category">Categoría:</label>
        <select name="category" id="category" required>
            <option value="">Selecciona una categoría</option>
            <option value="Electrónica">Electrónica</option>
            <option value="Ropa">Ropa</option>
            <option value="Hogar">Hogar</option>
            <option value="Alimentos y bebidas">Alimentos y bebidas</option>
            <option value="Muebles">Muebles</option>
            <option value="Deportes">Deportes</option>
            <option value="Juguetes">Juguetes</option>
            <option value="Belleza y cuidado personal">Belleza y cuidado personal</option>
        </select>
    </div>
    <div>
        <button type="submit">Agregar producto</button>
    </div>
</form>
