@extends('layouts.app')

@section('title', 'My Orders - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    <h1 class="text-4xl font-bold mt-3">Mis pedidos</h1>

    <!-- ORDERS TABLE -->
    <div class="mt-6 mb-4 overflow-x-auto shadow-md">
        <table class="min-w-full border-2 border-neutral-500">
            <thead class="bg-neutral-500 text-white">
                <tr>
                    <th class="px-6 py-4 border-b border-neutral-500 text-left">ID</th>
                    <th class="px-6 py-4 border-b border-neutral-500 text-left">Coste total</th>
                    <th class="px-6 py-4 border-b border-neutral-500 text-left">Estado</th>
                    <th class="px-6 py-4 border-b border-neutral-500 text-left">Fecha</th>
                    <th class="px-6 py-4 border-b border-neutral-500 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($orders as $order)

                <tr>
                    <td class="px-6 py-4 border-b border-neutral-500"> {{ $order->id }} </td>
                    <td class="px-6 py-4 border-b border-neutral-500"> {{ $order->total_amount }}$ </td>
                    <td class="px-6 py-4 border-b border-neutral-500">
                        @switch($order->status)
                            @case('pending')
                            <span class="bg-warning-soft text-fg-warning text-xs font-medium px-1.5 py-0.5 rounded">Pendiente</span>
                                @break
                            @case('processing')
                            <span class="bg-neutral-secondary-medium text-heading text-xs font-medium px-1.5 py-0.5 rounded">Procesando</span>
                                @break
                            @case('shipped')
                            <span class="bg-brand-softer text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded">Enviado</span>
                                @break
                            @case('delivered')
                            <span class="bg-success-soft text-fg-success-strong text-xs font-medium px-1.5 py-0.5 rounded">Entregado</span>
                                @break
                            @case('cancelled')
                            <span class="bg-danger-soft text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded">Cancelado</span>
                                @break

                            @default

                        @endswitch
                    </td>
                    <td class="px-6 py-4 border-b border-neutral-500"> {{ $order->created_at->format('d M Y') }} </td>

                    <!-- ACTIONS -->
                    <td class="px-6 py-4 border-b border-neutral-500">
                        <div class="flex items-center gap-3">

                            <!-- VIEW -->
                            <a href="{{ route('user.order.view', ['id' => $order->id]) }}" class="text-neutral-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                                    <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                </svg>
                            </a>

                        </div>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection
