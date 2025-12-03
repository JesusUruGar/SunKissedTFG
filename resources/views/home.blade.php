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
        @foreach ($products as $product)

        <!-- PRODUCTO -->
        <a href="{{ route('product', ['id' => $product->id]) }}">

            <img src="{{ asset('images/products/' . $product->images->first()->image_path) }}" alt="Logo" class="hover:scale-105 transition-transform duration-300">

            <div class="flex justify-between items-center mt-2">
                <h2 class="text-sm">{{ $product->name }}</h2>
                <p class="text-sm">${{ $product->price }}</p>
            </div>

        </a>

        @endforeach
    </div>


</div>
@endsection
