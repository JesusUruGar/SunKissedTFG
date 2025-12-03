@extends('layouts.app')

@section('title', 'Edit Product - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    <!-- BREADCRUMB -->
    <nav class="flex mb-3" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-body hover:text-fg-brand">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 me-1">
                        <path fill-rule="evenodd" d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 0 1-.517.608 7.45 7.45 0 0 0-.478.198.798.798 0 0 1-.796-.064l-.453-.324a1.875 1.875 0 0 0-2.416.2l-.243.243a1.875 1.875 0 0 0-.2 2.416l.324.453a.798.798 0 0 1 .064.796 7.448 7.448 0 0 0-.198.478.798.798 0 0 1-.608.517l-.55.092a1.875 1.875 0 0 0-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 0 1-.064.796l-.324.453a1.875 1.875 0 0 0 .2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 0 1 .796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 0 1 .517-.608 7.52 7.52 0 0 0 .478-.198.798.798 0 0 1 .796.064l.453.324a1.875 1.875 0 0 0 2.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 0 1-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 0 0 1.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 0 1-.608-.517 7.507 7.507 0 0 0-.198-.478.798.798 0 0 1 .064-.796l.324-.453a1.875 1.875 0 0 0-.2-2.416l-.243-.243a1.875 1.875 0 0 0-2.416-.2l-.453.324a.798.798 0 0 1-.796.064 7.462 7.462 0 0 0-.478-.198.798.798 0 0 1-.517-.608l-.091-.55a1.875 1.875 0 0 0-1.85-1.566h-.344ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
                    </svg>
                    Admin
                </a>
            </li>
            <li>
                <div class="flex items-center space-x-1.5">
                    <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                    <a href="{{ route('admin.products') }}" class="inline-flex items-center text-sm font-medium text-body hover:text-fg-brand">
                        Productos
                    </a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center space-x-1.5">
                    <svg class="w-3.5 h-3.5 rtl:rotate-180 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
                    <span class="inline-flex items-center text-sm font-medium text-body-subtle">Productos</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- TITLE -->
    @if (isset($product))
    <h1 class="text-4xl font-bold">Editar producto</h1>
    @else
    <h1 class="text-4xl font-bold">Crear producto</h1>
    @endif

    <!-- FORM -->
    <div class="max-w-xl lg:max-w-full shadow-md p-6 mt-6">

        <form action="{{ isset($product) ? route('admin.products.save', ['id' => $product->id]) : route('admin.products.save') }}" method="POST" enctype="multipart/form-data" class="mx-auto">

            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-4">

                <div class="max-w-md mx-auto w-full">

                    <!-- NAME -->
                    <div class="mb-5">
                        <label for="name" class="block mb-2.5 text-sm font-medium text-heading">
                            Nombre
                        </label>
                        <input type="text" name="name" id="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="" value="{{ $product->name ?? '' }}" required />
                    </div>

                    <!-- CATEGORY -->
                    <div class="mb-5">
                        <label for="category_id" class="block mb-2.5 text-sm font-medium text-heading">
                            Categoría
                        </label>
                        <select id="category_id" name="category_id" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="mb-5">
                        <label for="description" class="block mb-2.5 text-sm font-medium text-heading">
                            Descripción
                        </label>
                        <textarea id="description" name="description" rows="4" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required>{{ $product->description ?? '' }}</textarea>
                    </div>

                    <!-- PRICE -->
                    <div class="mb-5">

                        <label for="price" class="block mb-2.5 text-sm font-medium text-heading">
                            Precio
                        </label>

                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-heading" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2"/></svg>
                            </div>
                            <input type="number" name="price" id="price" aria-describedby="helper-text-explanation" class="block w-full ps-9 pe-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" placeholder="" value="{{ $product->price ?? '' }}" step="0.01" required />
                        </div>

                    </div>

                </div>

                <div class="max-w-md lg:max-w-full mx-auto w-full">

                    <!-- IMAGES -->
                    <div class="mb-7">
                        <label class="block mb-2.5 text-sm font-medium text-heading" for="images">Imágenes</label>
                        <input class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
                            name="images[]" id="images" type="file" multiple accept="image/*">

                        <!-- IMAGES PREVIEW -->
                        <div id="preview" class="mt-4 flex flex-wrap gap-4">

                            <!-- EXISTING IMAGES -->
                            @if (isset($product) && $product->images->count() > 0)
                                @foreach ($product->images->sortBy('order') as $image)
                                    <div class="relative group draggable"
                                        data-image-id="{{ $image->id }}"
                                        draggable="true">

                                        <!-- Imagen -->
                                        <img
                                            src="{{ asset('images/products/' . $image->image_path) }}"
                                            class="w-40 h-50 object-cover"
                                        >

                                        <!-- Botón eliminar -->
                                        <button type="button" class="absolute top-1 right-1 text-red-500 opacity-80 hover:opacity-100 cursor-pointer"
                                            onclick="deleteImage({{ $image->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                            </svg>
                                        </button>

                                        <!-- Checkbox marcar principal -->
                                        <div class="absolute bottom-1 left-1">
                                            <input
                                                type="radio"
                                                name="primary_image"
                                                {{ $image->is_primary ? 'checked' : '' }}
                                                onchange="setPrimaryImage({{ $image->id }})"
                                                class=""
                                            >
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>

                    </div>

                </div>

            </div>

            <!-- SAVE -->
            <div class="grid grid-cols-1 lg:grid-cols-2 mb-4 gap-6">

                <div class="max-w-md mx-auto w-full flex">
                    <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none flex items-center gap-1 cursor-pointer">
                        Guardar
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd" d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.03 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v4.94a.75.75 0 0 0 1.5 0v-4.94l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

            </div>

        </form>

    </div>

</div>

<script>
// --------------------------------------
// 1. IMAGE PREVIEW
// --------------------------------------
document.getElementById('images').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    const files = event.target.files;

    [...files].forEach(file => {
        if (!file.type.startsWith('image/')) {
            const warning = document.createElement('p');
            warning.textContent = `"${file.name}" no es un formato válido.`;
            warning.className = "text-red-500 text-sm";
            preview.appendChild(warning);
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            const wrapper = document.createElement('div');
            wrapper.className = "relative group draggable";
            wrapper.draggable = true;

            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = "w-40 h-50 object-cover";

            wrapper.appendChild(img);
            preview.appendChild(wrapper);
        };

        reader.readAsDataURL(file);
    });
});

// --------------------------------------
// 2. DELETE EXISTING IMAGE
// --------------------------------------
function deleteImage(imageId) {
    if (!confirm("¿Eliminar esta imagen?")) return;

    fetch(`/admin/product-images/${imageId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(res => {
        if (res.ok) {
            document.querySelector(`[data-image-id="${imageId}"]`).remove();
        }
    });
}

// --------------------------------------
// 3. SET PRIMARY IMAGE
// --------------------------------------
function setPrimaryImage(imageId) {
    fetch(`/admin/product-images/${imageId}/set-primary`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
}

// --------------------------------------
// 4. DRAG & DROP TO REORDER IMAGES
// --------------------------------------
let dragSrcEl = null;

document.addEventListener("dragstart", function(e) {
    let target = e.target.closest(".draggable");
    if (target) {
        dragSrcEl = target;
        e.dataTransfer.effectAllowed = "move";
    }
});

document.addEventListener("dragover", function(e) {
    if (e.target.closest(".draggable")) {
        e.preventDefault();
    }
});

document.addEventListener("drop", function(e) {
    const target = e.target.closest(".draggable");

    if (target && dragSrcEl) {
        e.preventDefault();

        const preview = document.getElementById('preview');

        // Insert dragged element before the target element
        if (target !== dragSrcEl) {
            preview.insertBefore(dragSrcEl, target.nextSibling);
            updateOrderOnServer();
        }
    }
});

// SEND NEW ORDER TO BACKEND
function updateOrderOnServer() {
    const ids = [...document.querySelectorAll('[data-image-id]')]
        .map((el, index) => ({
        id: el.dataset.imageId,
        order: index
    }));

    fetch(`/admin/product-images/reorder`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": '{{ csrf_token() }}'
        },
        body: JSON.stringify({ order: ids })
    });
}
</script>

@endsection
