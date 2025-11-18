@props([
    'name', // nombre del archivo SVG sin extensión
    'class' => '' // clases opcionales de Tailwind
])

@php
    $path = resource_path("svg/{$name}.svg");
@endphp

@if(file_exists($path))
    {!! str_replace('<svg', '<svg class="' . $class . '"', file_get_contents($path)) !!}
@else
    <!-- Opcional: Mostrar algo cuando no se encuentra el SVG -->
    <span class="text-red-500">SVG "{{ $name }}" no encontrado</span>
@endif
