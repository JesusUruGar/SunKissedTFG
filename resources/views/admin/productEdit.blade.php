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
                        <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                        <path d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                        <path fill-rule="evenodd" d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
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
                    <span class="inline-flex items-center text-sm font-medium text-body-subtle">{{ (isset($product)) ? 'Editar' : 'Crear' }} producto</span>
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
