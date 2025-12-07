@extends('layouts.app')

@section('title', 'Product - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    @if (!$product)

        <h1 class="text-3xl font-bold mb-4">Producto no encontrado</h1>
        <p class="text-gray-600">Lo sentimos, el producto que buscas no existe.</p>

    @else

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


        <!-- PRODUCT IMAGES CAROUSEL -->
        <div id="default-carousel" class="relative w-full" data-carousel="static">

            <!-- Carousel wrapper -->
            <div class="relative h-150 md:h-120 lg:h-150 xl:h-200 2xl:h-225 overflow-hidden">

                @if (isset($product->images) && count($product->images) > 0)

                    @foreach ($product->images as $index => $image)
                        <!-- Item -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('images/products/' . $image->image_path) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
                        </div>
                    @endforeach

                @else

                @endif
            </div>

            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 group-focus:outline-none group-hover:scale-120 transition-transform duration-200">
                    <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/></svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 group-focus:outline-none group-hover:scale-120 transition-transform duration-200">
                    <svg class="w-5 h-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>

        </div>


        <!-- PRODUCT INFO -->
        <div class="p-6">

            <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
            <p class="text-xl text-gray-700 mb-4">${{ $product->price }}</p>
            <p class="text-gray-600 mb-6">{{ $product->description }}</p>

            <form id="add-to-cart-form">

                <!-- SIZES -->
                <fieldset>
                    <div class="flex items-center gap-3 mb-6">

                        @foreach ($product->stocks as $stock)

                            @if ($stock->quantity == 0)

                            <div class="flex justify-center items-center border border-neutral-200 bg-neutral-200 text-body-subtle shadow-xs size-10 cursor-not-allowed">
                                <span>{{ strtoupper($stock->size) }}</span>
                            </div>

                            @else
                            <label class="flex justify-center items-center border border-neutral-200 shadow-xs size-10 hover:border-neutral-500 transition-colors duration-200">
                                <input type="radio" name="size" value="{{ $stock->size }}" class="hidden" data-stock-id="{{ $stock->id }}"/>
                                <span>{{ strtoupper($stock->size) }}</span>
                            </label>
                            @endif

                        @endforeach

                    </div>
                </fieldset>

                <!-- SUBMIT -->
                <button type="submit" class="flex justify-center items-center gap-2 bg-black text-white px-4 py-2 hover:bg-orange-600 transition-colors duration-200 cursor-pointer">
                    Agregar al carrito
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                    </svg>
                </button>

            </form>

        </div>

    </div>


    <script>

        // SIZE SELECTION SCRIPT ------------------------------------------------
        document.querySelectorAll('input[name="size"]').forEach(radio => {
            radio.addEventListener('change', function () {

                // Quitar estilos a TODOS los labels
                document.querySelectorAll('label').forEach(label => {
                    label.classList.remove('bg-black', 'text-white');
                    label.classList.add('border-neutral-200');
                });

                // Añadir estilos al label seleccionado
                const label = this.closest('label');
                label.classList.add('bg-black', 'text-white');
                label.classList.remove('border-neutral-200');
            });
        });

        // ADD TO CART SCRIPT ------------------------------------------------
        document.getElementById('add-to-cart-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const size = document.querySelector('input[name="size"]:checked');
            if (!size) {
                alert("Por favor selecciona una talla.");
                return;
            }

            const product = {
                id: {{ $product->id }},
                stock_id: size.dataset.stockId,
                name: "{{ $product->name }}",
                price: {{ $product->price }},
                size: size.value,
                quantity: 1,
                image: "{{ count($product->images) > 0 ? $product->images[0]->image_path : '' }}"
            };

            addToCart(product); // <-- usa la función de cart.js
        });

    </script>

    @endif

</div>

@endsection
