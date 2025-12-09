@extends('layouts.app')

@section('title', 'Brand - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    <div class="max-w-3xl mx-auto shadow-md p-8">

        <h1 class="text-4xl font-bold text-heading">Sobre nuestra marca</h1>

        <hr class="border-t border-gray-300 mt-3 mb-4">

        <div class="grid grid-cols-1 md:grid-cols-2 mt-6 gap-10">

            <p class="text-justify text-body">
                <span class="font-bold">SunKissed</span> es un proyecto web de una marca de ropa
                ficticia que busca satisfacer la inocente idea de como se vería mi propia
                marca de ropa.
                <br><br>
                Al ser un proyecto pequeño, más centrado en las tecnologías detrás de una plataforma
                de e-commerce, la propia marca no ha tomado un gran protagonismo en el proyecto y
                parte de los assets, como las imagenes de productos, han sido sacadas de otras marcas
                con uso educativo y personal.
                Principalmente se han utilizado imagenes de <a href="https://casa-borcaro.com/" target="_blank" class="font-bold hover:text-orange-500">Casa Borcaro</a>
                y <a href="https://satenier.com/" target="_blank" class="font-bold hover:text-orange-500">Satenier</a>.
                <br><br>
                A pesar de esto, se ha pensado mucho en la propia marca en el diseño y el planteamiento,
                y no se descarta en un futuro hacerla realidad.
                <br><br>
                <span class="italic">- Jesús Uruñuela</span>
            </p>

            <img src="{{ asset('images/about.jpg') }}" alt="Foto del creador de la marca" class="object-cover">

        </div>

    </div>

</div>
@endsection
