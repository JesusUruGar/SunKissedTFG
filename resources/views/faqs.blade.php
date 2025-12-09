@extends('layouts.app')

@section('title', 'FAQs - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    <h1 class="text-4xl font-bold">Preguntas Frecuentes</h1>

    <hr class="border-t border-gray-300 mt-4 mb-6">

    <div id="accordion-card" data-accordion="collapse">

        <!-- Pregunta 1 -->
        <h2 id="accordion-card-heading-1">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 aria-expanded:rounded-b-none aria-expanded=:shadow-none" data-accordion-target="#accordion-card-body-1" aria-expanded="false" aria-controls="accordion-card-body-1">
                <span>¿De donde surge SunKissed?</span>
                <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/></svg>
            </button>
        </h2>
        <div id="accordion-card-body-1" class="hidden border border-t-0 border-default shadow-xs bg-white" aria-labelledby="accordion-card-heading-1">
            <div class="p-4 md:p-5">

                <p class="mb-2 text-body">
                    Surge de la idea de mezclar conceptos de moda urbana actual con la
                    cultura del sur y la costa. De ahí la idea de <span class="font-bold">SunKissed</span>,
                    que traducido de forma literal sería "<span class="italic">Besado por el sol</span>".

                </p>

            </div>
        </div>

        <!-- Pregunta 2 -->
        <h2 id="accordion-card-heading-2" class="mt-4">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 aria-expanded:rounded-b-none aria-expanded=:shadow-none" data-accordion-target="#accordion-card-body-2" aria-expanded="false" aria-controls="accordion-card-body-2">
                <span>¿En que se diferencia de otras marcas emergentes?</span>
                <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/></svg>
            </button>
        </h2>
        <div id="accordion-card-body-2" class="hidden border border-t-0 border-default shadow-xs bg-white" aria-labelledby="accordion-card-heading-2">
            <div class="p-4 md:p-5">

                <p class="mb-2 text-body">
                    Muchos proyectos en españa repiten la misma formula de sudaderas, camisetas
                    y otros productos con estampados calcados unos de otros.
                    Sin embargo <span class="font-bold">SunKissed</span> busca traer frescura
                    y evocar una cierta nostalgia a través de los diseños, materiales y cortes
                    hechos a mano.
                </p>

            </div>
        </div>

        <!-- Pregunta 3 -->
        <h2 id="accordion-card-heading-3" class="mt-4">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-body shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 aria-expanded:rounded-b-none aria-expanded=:shadow-none" data-accordion-target="#accordion-card-body-3" aria-expanded="false" aria-controls="accordion-card-body-3">
                <span>¿Que objetivos tenemos a corto y largo plazo?</span>
                <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7"/></svg>
            </button>
        </h2>
        <div id="accordion-card-body-3" class="hidden border border-t-0 border-default shadow-xs bg-white" aria-labelledby="accordion-card-heading-3">
            <div class="p-4 md:p-5">

                <p class="mb-2 text-body">
                    Actualmente nos estamos centrando en traer pocos productos, pero con la mejor
                    calidad posible y que realmente pensemos que merece la pena vender. Al fin y
                    al cabo, esta marca no ha sido concebida como una macro-empresa que busque
                    llegar a grandes masas, si no como una ventana a nuestra cultura y una forma
                    de que la gente que se sienta identificada pueda expresarse a través de nuestras
                    prendas.
                </p>

            </div>
        </div>

    </div>

</div>
@endsection
