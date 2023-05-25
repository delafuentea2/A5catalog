@include('layouts.app')

<form action="{{ route('providers.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="company_name">Compañia:</label>
        <input type="text" name="company_name" id="company_name" required>
    </div>
    <div>
        <label for="phone">Telefono:</label>
        <input type="tel" name="phone" id="phone" required>
    </div>
    <button type="submit">Guardar</button>
</form>
