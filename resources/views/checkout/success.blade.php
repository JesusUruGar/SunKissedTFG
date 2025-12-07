@extends('layouts.app')

@section('title', 'Pedido completado')

@section('content')
<div class="container py-5 flex flex-col items-center">

    <div class="text-center mb-7">
        <h1 class="text-2xl font-bold text-success">¡Gracias por tu pedido! 🎉</h1>
        <p class="text-neutral-500">Tu pedido #{{ $order->id }} se ha procesado correctamente.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div>
            <!-- Resumen general -->
            <div class="max-w-md mx-auto p-8 shadow mb-5">
                <h4 class="fw-bold mb-3">Resumen del pedido</h4>

                <p><strong>Estado:</strong> {{ ucfirst($order->status) }}</p>
                <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Total pagado:</strong> €{{ number_format($order->total_amount, 2, ',', '.') }}</p>
            </div>

            <!-- Dirección -->
            <div class="max-w-md mx-auto p-8 shadow">
                <h4 class="fw-bold mb-3">Dirección de envío</h4>

                <p>{{ $order->address->street }}</p>
                <p>{{ $order->address->city }} ({{ $order->address->postal_code }})</p>
                <p>{{ $order->address->country }}</p>

                @if($order->address->extra_details)
                    <p class="text-muted">📝 {{ $orderaddress->extra_details }}</p>
                @endif
            </div>
        </div>

        <div>
            <!-- Items -->
            <div class="max-w-xl mx-auto p-8 shadow mb-4">

                <h4 class="fw-bold mb-3">Artículos comprados</h4>

                <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-x border border-default">
                    <table class="w-full text-sm text-left rtl:text-right text-body">
                        <thead class="text-sm text-body bg-neutral-secondary-soft border-b border-default">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-medium"></th>
                                <th scope="col" class="px-6 py-3 font-medium">Producto</th>
                                <th scope="col" class="px-6 py-3 font-medium">Talla</th>
                                <th scope="col" class="px-6 py-3 font-medium">Cantidad</th>
                                <th scope="col" class="px-6 py-3 font-medium">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr class="bg-neutral-primary border-b border-default">
                                    <td class="px-6 py-4">
                                            <img src="{{ asset('images/products/' . ($item->stock->product->primaryImage->image_path ?? ($item->stock->product->images->first()->image_path ?? 'default.webp' ))) }}"
                                                class="h-16 w-16 object-cover"
                                                alt="Producto">
                                    </td>
                                    <td class="px-6 py-4 font-medium text-heading whitespace-nowrap">{{ $item->stock->product->name }}</td>
                                    <td class="px-6 py-4">{{ strtoupper($item->stock->size) }}</td>
                                    <td class="px-6 py-4">{{ $item->quantity }}</td>
                                    <td class="px-6 py-4">€{{ number_format($item->price, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <div class="flex justify-center mt-4">
        <a href="{{ route('home') }}" class="flex justify-center items-center gap-2 bg-black text-white px-4 py-2 hover:bg-orange-600 transition-colors duration-200 cursor-pointer">
            Volver a la tienda
        </a>
    </div>

</div>

<script>
    // Vaciar carrito del LocalStorage
    localStorage.removeItem('cart');

    // Si usas otra clave:
    // localStorage.removeItem('cart_items');

    // Actualizar contador en el header
    if (typeof updateCartCount === 'function') {
        updateCartCount();
    }
</script>

@endsection
