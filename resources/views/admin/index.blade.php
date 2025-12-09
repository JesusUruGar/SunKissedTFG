@extends('layouts.app')

@section('title', 'Admin - SUNKISSED')

@section('content')

<div class="container flex flex-col items-center mx-auto px-4 py-10">

    <h1 class="text-4xl font-bold mb-7">Panel de administración</h1>

    <div class="flex w-fit items-center gap-6 border border-neutral-200 p-6 shadow-sm">

        <!-- USERS -->
        <div>
            <a href="{{ route('admin.users') }}" class="size-20 bg-blue-400 flex justify-center items-center text-white shadow-md hover:bg-blue-500 transition-colors duration-200 cursor-pointer border-2 border-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                    <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                </svg>
            </a>
            <h2 class="text-center font-medium mt-1">Usuarios</h2>
        </div>

        <!-- PRODUCTS -->
        <div>
            <a href="{{ route('admin.products') }}" class="size-20 bg-orange-400 flex justify-center items-center text-white shadow-md hover:bg-orange-500 transition-colors duration-200 cursor-pointer border-2 border-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                    <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                    <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>
            </a>
            <h2 class="text-center font-medium mt-1">Productos</h2>
        </div>

        <!-- CATEGORIES -->
        <div>
            <a href="{{ route('admin.categories') }}" class="size-20 bg-green-400 flex justify-center items-center text-white shadow-md hover:bg-green-500 transition-colors duration-200 cursor-pointer border-2 border-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z" clip-rule="evenodd" />
                </svg>
            </a>
            <h2 class="text-center font-medium mt-1">Categorías</h2>
        </div>

        <!-- CATEGORIES -->
        <div>
            <a href="{{ route('admin.orders') }}" class="size-20 bg-purple-400 flex justify-center items-center text-white shadow-md hover:bg-purple-500 transition-colors duration-200 cursor-pointer border-2 border-purple-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                    <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 1 1 6 0h3a.75.75 0 0 0 .75-.75V15Z" />
                <path d="M8.25 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0ZM15.75 6.75a.75.75 0 0 0-.75.75v11.25c0 .087.015.17.042.248a3 3 0 0 1 5.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 0 0-3.732-10.104 1.837 1.837 0 0 0-1.47-.725H15.75Z" />
                    <path d="M19.5 19.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                </svg>
            </a>
            <h2 class="text-center font-medium mt-1">Pedidos</h2>
        </div>

    </div>

</div>
@endsection
