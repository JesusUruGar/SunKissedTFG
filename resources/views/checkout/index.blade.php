@extends('layouts.app')

@section('title', 'Checkout - SUNKISSED')

@section('content')
<div class="container mx-auto px-4 py-10">

    <!-- ERRORS -->
    @if (session('error'))
        <div class="px-4 py-2 bg-red-100 text-red-600 mb-5">
            {{ session('error') }}
        </div>
    @endif


    <h1 class="text-3xl font-bold mb-6">Resumen del pedido</h1>

    <form id="checkout-form" method="POST" action="{{ route('checkout.process') }}" class="bg-white p-10 shadow-md w-full">
        @csrf

        <!-- Lista de productos del carrito -->
        <div id="cart-summary-container" class="mb-6"></div>

        <!-- Inputs hidden para enviar el carrito al backend -->
        <input type="hidden" name="cart_items" id="cart_items">

        <!-- Dirección -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Dirección de envío</h2>
            <input type="text" name="street" placeholder="Calle" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body mb-2" required>
            <input type="text" name="city" placeholder="Ciudad" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body mb-2" required>
            <input type="text" name="postal_code" placeholder="Código postal" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body mb-2" required>
            <input type="text" name="country" placeholder="País" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body mb-2" required>
            <textarea name="extra_details" placeholder="Detalles extra" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body mb-2"></textarea>
        </div>

        <!-- Método de pago -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Método de pago</h2>
            <select name="payment_method" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" required>
                <option value="card">Tarjeta</option>
                <option value="cash">Efectivo</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>

        <button type="submit" class="bg-black text-white px-4 py-2 hover:bg-orange-600 cursor-pointer">Realizar pedido</button>
    </form>
</div>

<script>
    // Cargar carrito en resumen
    document.addEventListener('DOMContentLoaded', function() {
        const cart = getCart();
        const container = document.getElementById('cart-summary-container');
        const cartItemsInput = document.getElementById('cart_items');

        if (cart.length === 0) {
            container.innerHTML = '<p>El carrito está vacío.</p>';
            return;
        }

        let totalHTML = '';
        let totalAmount = 0;

        cart.forEach(item => {
            totalAmount += item.price * item.quantity;
            totalHTML += `
                <div class="flex justify-between mb-2">
                    <span>${item.name} (${item.size.toUpperCase()}) x ${item.quantity}</span>
                    <span>€${(item.price*item.quantity).toFixed(2)}</span>
                </div>
            `;
        });

        totalHTML += `<div class="font-bold mt-4">Total: €${totalAmount.toFixed(2)}</div>`;
        container.innerHTML = totalHTML;

        // Enviar carrito al backend como JSON
        cartItemsInput.value = JSON.stringify(cart);
    });
</script>
@endsection
