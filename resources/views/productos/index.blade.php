<!-- Vista de catálogo de productos -->
@include('layouts.app')

<style>
.container {
  margin-top: 10px;
  justify-content: center;
  align-items: center;
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-right: -10px;
  margin-left: -10px;
}

.col-md-4 {
  flex: 0 0 33.333333%;
  max-width: 33.333333%;
  padding: 10px;
}

.card {
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 10px;
}

.card-img-top {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 4px;
}

.card-body {
  text-align: center;
}

.card-title {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 10px;
}

.card-text {
  font-size: 14px;
  margin-bottom: 10px;
}

.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  cursor: pointer;
  border: 1px solid transparent;
  border-radius: 4px;
}

.btn-primary {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

.btn-primary:hover {
  background-color: #0069d9;
  border-color: #0062cc;
}

.mb-3 {
  margin-bottom: 1rem;
}

.popup-form {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    padding: 20px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    z-index: 9999;
    display: none;
}

.popup-form h4 {
    margin-top: 0;
}

.popup-form label {
    display: block;
    margin-bottom: 5px;
}

.popup-form input[type="number"] {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 10px;
}

.popup-form button {
    margin-top: 10px;
}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
    display: none;
}
.catalog-container {
    margin-top: 0;
}

</style>

<div class="catalog-container"> <!--Espacio del medio-->
    <div class="container">
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="https://picsum.photos/200/300?random={{ $loop->index }}" alt="Imagen del producto">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->name }}</h5>
                            <p class="card-text">{{ $producto->description }}</p>
                            <p class="price">{{ $producto->price }}€</p>
                            <button class="btn btn-primary addToCart" data-product-id="{{ $producto->id }}">Al carro</button>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

   <!-- Formulario emergente -->
<div id="popupForm" class="popup-form">
<form id="cartForm" action="{{ route('cart.store') }}" method="POST">
    @csrf
    <h4>Agregar al carro</h4>
    <div>
        <label for="quantity">Cantidad:</label>
        <input type="number" id="quantity" name="quantity" required>
    </div>
    <input type="hidden" id="productId" name="productId">
    <button type="submit" class="btn btn-primary">Agregar</button>
    <button type="button" class="btn btn-secondary closePopup">Cerrar</button>
</form>

</div>

<script>
// Función para abrir el formulario emergente
function openPopupForm(productId) {
    document.getElementById('productId').value = productId;
    document.getElementById('popupForm').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

// Función para cerrar el formulario emergente
function closePopupForm() {
    document.getElementById('popupForm').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

// Obtener todos los botones "Al carro"
const addToCartButtons = document.getElementsByClassName('addToCart');

// Agregar evento de clic a cada botón
for (let i = 0; i < addToCartButtons.length; i++) {
    addToCartButtons[i].addEventListener('click', function() {
        const productId = this.getAttribute('data-product-id');
        openPopupForm(productId);
    });
}

// Obtener el botón "Cerrar" del formulario emergente
const closePopupButton = document.querySelector('.closePopup');

// Agregar evento de clic al botón "Cerrar"
closePopupButton.addEventListener('click', function() {
    closePopupForm();
});
</script>
