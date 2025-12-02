@extends('layouts.app')

@section('title', 'SUNKISSED')

@section('content')

<div class="w-full">
    <img src="{{ asset('images/banner.webp') }}" alt="Banner" class="w-full">
</div>

<div class="container mx-auto px-4 py-10">

    <h1 class="text-4xl font-bold">Productos destacados ★★</h1>

    <hr class="border-t border-gray-300 mt-2 mb-4">

    <!-- PRODUCTOS DESTACADOS -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
        @for ($i = 0; $i < 10; $i++)

        <!-- PRODUCTO -->
        <a href="{{ route('product') }}">

            <img src="{{ asset('images/camiseta.webp') }}" alt="Logo" class="hover:scale-105 transition-transform duration-300">

            <div class="flex justify-between items-center mt-2">
                <h2 class="text-sm">LA DURA VIDA TEE</h2>
                <p class="text-sm">$29.99</p>
            </div>

        </a>

        @endfor
    </div>


</div>
@endsection
