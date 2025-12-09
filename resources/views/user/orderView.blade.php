@extends('layouts.app')

@section('title', 'Edit Category - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    <!-- BREADCRUMB -->
    <nav class="flex mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('user.order-history') }}" class="inline-flex items-center text-sm font-medium text-body hover:text-fg-brand">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 me-1">
                                <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                                <path d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                                <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                            </svg>
                    Mis pedidos
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center space-x-1.5">
                    <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                    <span class="inline-flex items-center text-sm font-medium text-body-subtle">Ver pedido</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- TITLE -->
    <h1 class="text-4xl font-bold">Ver pedido</h1>

    <!-- SUMMARY -->
    <div class="shadow-md p-6 mt-6">

            <div class="mb-10 grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- General summary -->
                <div class="max-w-md">
                    <h4 class="text-xl font-bold text-heading mb-3">Resumen del pedido</h4>

                    <p><span class="font-medium">Estado:</span> {{ ucfirst($order->status) }}</p>
                    <p><span class="font-medium">Fecha:</span> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                    <p><span class="font-medium">Total pagado:</span> €{{ number_format($order->total_amount, 2, ',', '.') }}</p>
                </div>

                <!-- Address -->
                <div class="max-w-md">
                    <h4 class="text-xl font-bold text-heading mb-3">Dirección de envío</h4>

                    <p>{{ $order->address->street }}</p>
                    <p>{{ $order->address->city }} ({{ $order->address->postal_code }})</p>
                    <p>{{ $order->address->country }}</p>

                    @if($order->address->extra_details)
                        <p class="text-muted">📝 {{ $orderaddress->extra_details }}</p>
                    @endif
                </div>

            </div>

            <!-- ITEMS -->
            <div class="mb-5">

                <h4 class="text-xl font-bold text-heading mb-4">Artículos comprados</h4>

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

@endsection
