@extends('layouts.app')

@section('title', 'Orders - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    <!-- BREADCRUMB -->
    <nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-body hover:text-fg-brand">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 me-1">
                    <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                    <path d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                    <path fill-rule="evenodd" d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
                Admin
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center space-x-1.5">
                <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                <span class="inline-flex items-center text-sm font-medium text-body-subtle">Pedidos</span>
            </div>
        </li>
    </ol>
    </nav>

    <h1 class="text-4xl font-bold mt-3">Pedidos</h1>

    <!-- ORDERS TABLE -->
    <div class="mt-6 mb-4 overflow-x-auto shadow-md">
        <table class="min-w-full border-2 border-purple-500">
            <thead class="bg-purple-500 text-white">
                <tr>
                    <th class="px-6 py-4 border-b border-purple-500 text-left">ID</th>
                    <th class="px-6 py-4 border-b border-purple-500 text-left">Usuario</th>
                    <th class="px-6 py-4 border-b border-purple-500 text-left">Coste total</th>
                    <th class="px-6 py-4 border-b border-purple-500 text-left">Estado</th>
                    <th class="px-6 py-4 border-b border-purple-500 text-left">Fecha</th>
                    <th class="px-6 py-4 border-b border-purple-500 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($orders as $order)

                <tr>
                    <td class="px-6 py-4 border-b border-purple-500"> {{ $order->id }} </td>
                    <td class="px-6 py-4 border-b border-purple-500"> {{ $order->user->name }} </td>
                    <td class="px-6 py-4 border-b border-purple-500"> {{ $order->total_amount }}$ </td>
                    <td class="px-6 py-4 border-b border-purple-500">
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
                    <td class="px-6 py-4 border-b border-purple-500"> {{ $order->created_at->format('d M Y') }} </td>

                    <!-- ACTIONS -->
                    <td class="px-6 py-4 border-b border-purple-500">
                        <div class="flex items-center gap-3">

                            <!-- VIEW -->
                            <a href="{{ route('admin.orders.view', ['id' => $order->id]) }}" class="text-neutral-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                                    <path fill-rule="evenodd" d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 0 1-.517.608 7.45 7.45 0 0 0-.478.198.798.798 0 0 1-.796-.064l-.453-.324a1.875 1.875 0 0 0-2.416.2l-.243.243a1.875 1.875 0 0 0-.2 2.416l.324.453a.798.798 0 0 1 .064.796 7.448 7.448 0 0 0-.198.478.798.798 0 0 1-.608.517l-.55.092a1.875 1.875 0 0 0-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 0 1-.064.796l-.324.453a1.875 1.875 0 0 0 .2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 0 1 .796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 0 1 .517-.608 7.52 7.52 0 0 0 .478-.198.798.798 0 0 1 .796.064l.453.324a1.875 1.875 0 0 0 2.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 0 1-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 0 0 1.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 0 1-.608-.517 7.507 7.507 0 0 0-.198-.478.798.798 0 0 1 .064-.796l.324-.453a1.875 1.875 0 0 0-.2-2.416l-.243-.243a1.875 1.875 0 0 0-2.416-.2l-.453.324a.798.798 0 0 1-.796.064 7.462 7.462 0 0 0-.478-.198.798.798 0 0 1-.517-.608l-.091-.55a1.875 1.875 0 0 0-1.85-1.566h-.344ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
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
