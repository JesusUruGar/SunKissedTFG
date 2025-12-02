@extends('layouts.app')

@section('title', 'Product - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <img src="{{ asset('images/camiseta.webp') }}" alt="Camiseta Sunkissed">

        <div class="p-6">

            <h1 class="text-3xl font-bold mb-4">LA DURA VIDA TEE</h1>
            <p class="text-xl text-gray-700 mb-4">$29.99</p>
            <p class="text-gray-600 mb-6">Experimenta la comodidad y el estilo con nuestra camiseta "LA DURA VIDA TEE". Hecha con materiales de alta calidad, esta camiseta es perfecta para cualquier ocasión.</p>

            <form action="">

                <!-- TALLAS -->
                <fieldset>
                    <div class="flex items-center gap-3 mb-6">

                        <label class="flex justify-center items-center border border-neutral-200 shadow-xs size-10 hover:border-neutral-500 transition-colors duration-200">
                            <input type="radio" name="size" value="s" class="hidden"/>
                            <span>S</span>
                        </label>

                        <label class="flex justify-center items-center border border-neutral-200 shadow-xs size-10 hover:border-neutral-500 transition-colors duration-200">
                            <input type="radio" name="size" value="m" class="hidden"/>
                            <span>M</span>
                        </label>

                        <label class="flex justify-center items-center border border-neutral-200 shadow-xs size-10 hover:border-neutral-500 transition-colors duration-200">
                            <input type="radio" name="size" value="l" class="hidden"/>
                            <span>L</span>
                        </label>

                        <label class="flex justify-center items-center border border-neutral-200 shadow-xs size-10 hover:border-neutral-500 transition-colors duration-200">
                            <input type="radio" name="size" value="xl" class="hidden"/>
                            <span>XL</span>
                        </label>

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

</div>

<!-- Script para manejar selección de tallas -->
<script>
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
</script>

@endsection
