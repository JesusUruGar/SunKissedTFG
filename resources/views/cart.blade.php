@extends('layouts.app')

@section('title', 'Carrito - SUNKISSED')

@section('content')
<div class="container mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold mb-6">Tu carrito</h1>

    <!-- Contenedor del carrito -->
    <div id="cart-container" class="space-y-6">
        <!-- Aquí se insertarán los productos vía JS -->
    </div>

    <!-- Si el carrito está vacío -->
    <p id="empty-cart" class="text-gray-500 text-lg hidden">
        Tu carrito está vacío.
    </p>

    <!-- Totales -->
    <div id="cart-summary" class="mt-10 p-6 bg-gray-100 hidden">
        <div class="flex justify-between text-xl font-semibold">
            <span>Total:</span>
            <span id="cart-total">€0.00</span>
        </div>

        <div class="flex gap-4 mt-6">
            <button id="clear-cart" class="px-4 py-2 bg-neutral-600 text-white hover:bg-red-600 cursor-pointer">
                Vaciar carrito
            </button>

            <a href="{{ route('checkout.show') }}" class="px-4 py-2 bg-black text-white hover:bg-orange-600 cursor-pointer">
                Comprar
            </a>
        </div>
    </div>

</div>

<script>
    // Cargar el carrito en la vista
    function loadCart() {
        const cart = getCart(); // función de cart.js
        const container = document.getElementById('cart-container');
        const emptyCart = document.getElementById('empty-cart');
        const summary = document.getElementById('cart-summary');

        container.innerHTML = '';

        if (cart.length === 0) {
            emptyCart.classList.remove('hidden');
            summary.classList.add('hidden');
            return;
        }

        emptyCart.classList.add('hidden');
        summary.classList.remove('hidden');

        let total = 0;

        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;

            const productHTML = `
                <div class="flex items-center justify-between bg-white p-4 shadow-md">

                    <div class="flex items-center gap-4">
                        <img src="/images/products/${item.image}" class="w-20 h-25 object-cover" />

                        <div>
                            <h2 class="text-xl font-semibold">${item.name}</h2>
                            <p class="text-gray-600">Talla: <strong>${item.size.toUpperCase()}</strong></p>
                            <p class="text-gray-900 font-bold">€${item.price.toFixed(2)}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">

                        <!-- Botones cantidad -->
                        <button onclick="adjustQuantity(${item.id}, '${item.size}', -1)"
                            class="px-3 py-1 bg-gray-200 hover:bg-gray-300 shadow-sm">-</button>

                        <span class="text-lg font-semibold">${item.quantity}</span>

                        <button onclick="adjustQuantity(${item.id}, '${item.size}', 1)"
                            class="px-3 py-1 bg-gray-200 hover:bg-gray-300 shadow-sm">+</button>

                        <!-- Eliminar -->
                        <button onclick="removeCartItem(${item.id}, '${item.size}')"
                            class="ml-4 text-red-600 hover:text-red-800 cursor-pointer">Eliminar</button>
                    </div>

                </div>
            `;

            container.innerHTML += productHTML;
        });

        document.getElementById('cart-total').textContent = `€${total.toFixed(2)}`;
    }

    // Ajustar cantidad usando cart.js
    function adjustQuantity(productId, size, delta) {
        const cart = getCart();
        const item = cart.find(i => i.id === productId && i.size === size);
        if (!item) return;

        const newQty = item.quantity + delta;

        if (newQty <= 0) {
            removeFromCart(productId, size);
        } else {
            updateQuantity(productId, size, newQty);
        }

        loadCart();
    }

    // Eliminar producto del carrito usando cart.js
    function removeCartItem(productId, size) {
        removeFromCart(productId, size);
        loadCart();
    }

    // Vaciar carrito usando cart.js
    document.getElementById('clear-cart').addEventListener('click', () => {
        clearCart();
        loadCart();
    });

    // Inicializar
    document.addEventListener('DOMContentLoaded', loadCart);
</script>
@endsection
