@extends('layouts.app')

@section('title', 'Products CRUD - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    <!-- BREADCRUMB -->
    <nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-body hover:text-fg-brand">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 me-1">
                    <path fill-rule="evenodd" d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 0 1-.517.608 7.45 7.45 0 0 0-.478.198.798.798 0 0 1-.796-.064l-.453-.324a1.875 1.875 0 0 0-2.416.2l-.243.243a1.875 1.875 0 0 0-.2 2.416l.324.453a.798.798 0 0 1 .064.796 7.448 7.448 0 0 0-.198.478.798.798 0 0 1-.608.517l-.55.092a1.875 1.875 0 0 0-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 0 1-.064.796l-.324.453a1.875 1.875 0 0 0 .2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 0 1 .796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 0 1 .517-.608 7.52 7.52 0 0 0 .478-.198.798.798 0 0 1 .796.064l.453.324a1.875 1.875 0 0 0 2.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 0 1-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 0 0 1.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 0 1-.608-.517 7.507 7.507 0 0 0-.198-.478.798.798 0 0 1 .064-.796l.324-.453a1.875 1.875 0 0 0-.2-2.416l-.243-.243a1.875 1.875 0 0 0-2.416-.2l-.453.324a.798.798 0 0 1-.796.064 7.462 7.462 0 0 0-.478-.198.798.798 0 0 1-.517-.608l-.091-.55a1.875 1.875 0 0 0-1.85-1.566h-.344ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                </svg>
                Admin
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center space-x-1.5">
                <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                <span class="inline-flex items-center text-sm font-medium text-body-subtle">Productos</span>
            </div>
        </li>
    </ol>
    </nav>

    <h1 class="text-4xl font-bold mt-3">Productos</h1>

    <!-- PRODUCTS TABLE -->
    <div class="mt-6 mb-4 overflow-x-auto shadow-md">
        <table class="min-w-full border-2 border-orange-500">
            <thead class="bg-orange-500 text-white">
                <tr>
                    <th class="px-6 py-4 border-b border-orange-500 text-left">ID</th>
                    <th class="px-6 py-4 border-b border-orange-500 text-left">Categoría</th>
                    <th class="px-6 py-4 border-b border-orange-500 text-left">IMG</th>
                    <th class="px-6 py-4 border-b border-orange-500 text-left">Nombre</th>
                    <th class="px-6 py-4 border-b border-orange-500 text-left">Descripción</th>
                    <th class="px-6 py-4 border-b border-orange-500 text-left">Precio</th>
                    <th class="px-6 py-4 border-b border-orange-500 text-left">Stock</th>
                    <th class="px-6 py-4 border-b border-orange-500 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)

                <tr>
                    <td class="px-6 py-4 border-b border-orange-500"> {{ $product->id }} </td>
                    <td class="px-6 py-4 border-b border-orange-500"> {{ $product->category->name ?? 'Sin categoría' }} </td>

                    <!-- IMAGE -->
                    <td class="min-w-30 px-6 py-4 border-b border-orange-500">
                        @if($product->images)
                            <img src="{{ asset('images/products/' . $product->primaryImage->image_path) }}" alt="Imagen del producto" class="w-20 h-30 object-cover">
                        @else
                            <span class="text-sm text-body-subtle">No image</span>
                        @endif
                    </td>

                    <td class="px-6 py-4 border-b border-orange-500"> {{ $product->name }} </td>
                    <td class="px-6 py-4 border-b border-orange-500"> {{ $product->description }} </td>
                    <td class="px-6 py-4 border-b border-orange-500"> {{ $product->price }}$ </td>

                    <!-- STOCK -->
                    <td class="min-w-25 px-6 py-4 border-b border-orange-500">
                        <ul>
                            @foreach ($product->stocks as $variant)
                                <li class="mb-2">
                                    <span class="font-bold">{{ $variant->size }}</span> - {{ $variant->quantity }}
                                </li>
                            @endforeach

                        </ul>
                    </td>

                    <!-- ACTIONS -->
                    <td class="px-6 py-4 border-b border-orange-500">
                        <div class="flex items-center gap-3">

                            <!-- EDIT -->
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                                    <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                                </svg>
                            </a>

                            <!-- DELETE -->
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="flex items-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 cursor-pointer" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <!-- CREATE PRODUCT -->
    <div class="flex mt-2">
        <a href="{{ route('admin.products.create') }}" class="text-white bg-success box-border border border-transparent hover:bg-success-strong focus:ring-4 focus:ring-success-medium shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none flex items-center gap-1">
            Crear
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>


</div>
@endsection
