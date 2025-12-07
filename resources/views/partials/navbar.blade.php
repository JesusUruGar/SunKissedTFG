{{-- <div class="bg-blue-700">
    <div class="container mx-auto px-4 py-2 text-white text-xs text-center">
        3 x 2 - No te pierdas la nueva oferta EXCLUSIVA en la WEB / ENTREGA INTERNACIONAL
    </div>
</div> --}}

<nav class="bg-white">
    <div class="mx-auto px-5 py-2 flex justify-between items-center">
        <a href="{{ route('home') }}" class="hover:text-orange-600">
            <x-icon name="Sunkissed_ICON" class="w-16 h-16 m-0" />
        </a>

        <ul class="flex space-x-7 text-m font-medium">
            <li><a href="{{ route('home') }}" class="hover:text-orange-600 {{ request()->routeIs('home') ? 'border-b-2' : '' }}">HOME</a></li>
            <li><a href="{{ route('brand') }}" class="hover:text-orange-600 {{ request()->routeIs('brand') ? 'border-b-2' : '' }}">BRAND</a></li>
            <li><a href="{{ route('faqs') }}" class="hover:text-orange-600 {{ request()->routeIs('faqs') ? 'border-b-2' : '' }}">FAQS</a></li>
        </ul>

        <ul class="flex space-x-4 my-2">

            <!-- USER -->
            <button id="dropdownNvbarButton" data-dropdown-toggle="dropdownNavbar" class="hover:text-orange-600 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5.5">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Dropdown USER -->
            <div id="dropdownNavbar" class="z-100 hidden bg-neutral-primary-medium border border-default-medium shadow-lg w-44">
                <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownNvbarButton">

                    {{-- <li><a href="{{ route('user') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading">
                        Perfil
                    </a></li> --}}

                    @guest
                        <li><a href="{{ route('show.login') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading">
                            Iniciar Sesión
                        </a></li>

                        <li><a href="{{ route('show.register') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading">
                            Registro
                        </a></li>
                    @endguest

                    @auth

                        @if (auth()->user()->isAdmin())
                            <li><a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-1 w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading">
                                Admin
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                    <path fill-rule="evenodd" d="M12 6.75a5.25 5.25 0 0 1 6.775-5.025.75.75 0 0 1 .313 1.248l-3.32 3.319c.063.475.276.934.641 1.299.365.365.824.578 1.3.64l3.318-3.319a.75.75 0 0 1 1.248.313 5.25 5.25 0 0 1-5.472 6.756c-1.018-.086-1.87.1-2.309.634L7.344 21.3A3.298 3.298 0 1 1 2.7 16.657l8.684-7.151c.533-.44.72-1.291.634-2.309A5.342 5.342 0 0 1 12 6.75ZM4.117 19.125a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-.008a.75.75 0 0 1-.75-.75v-.008Z" clip-rule="evenodd" />
                                    <path d="m10.076 8.64-2.201-2.2V4.874a.75.75 0 0 0-.364-.643l-3.75-2.25a.75.75 0 0 0-.916.113l-.75.75a.75.75 0 0 0-.113.916l2.25 3.75a.75.75 0 0 0 .643.364h1.564l2.062 2.062 1.575-1.297Z" />
                                    <path fill-rule="evenodd" d="m12.556 17.329 4.183 4.182a3.375 3.375 0 0 0 4.773-4.773l-3.306-3.305a6.803 6.803 0 0 1-1.53.043c-.394-.034-.682-.006-.867.042a.589.589 0 0 0-.167.063l-3.086 3.748Zm3.414-1.36a.75.75 0 0 1 1.06 0l1.875 1.876a.75.75 0 1 1-1.06 1.06L15.97 17.03a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>
                            </a></li>
                        @endif

                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="inline-flex items-center gap-1 w-full p-2 text-danger hover:bg-red-100 hover:text-danger-strong cursor-pointer">
                                @csrf

                                <button type="submit" class="cursor-pointer">
                                    Cerrar Sesión
                                </button>

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                    <path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 0 0 6 5.25v13.5a1.5 1.5 0 0 0 1.5 1.5h6a1.5 1.5 0 0 0 1.5-1.5V15a.75.75 0 0 1 1.5 0v3.75a3 3 0 0 1-3 3h-6a3 3 0 0 1-3-3V5.25a3 3 0 0 1 3-3h6a3 3 0 0 1 3 3V9A.75.75 0 0 1 15 9V5.25a1.5 1.5 0 0 0-1.5-1.5h-6Zm10.72 4.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1 0 1.06l-3 3a.75.75 0 1 1-1.06-1.06l1.72-1.72H9a.75.75 0 0 1 0-1.5h10.94l-1.72-1.72a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                </svg>

                            </form>
                        </li>
                    @endauth


                </ul>
            </div>

            <!-- SEARCH -->
            <li><a href="{{ route('search') }}" class="hover:text-orange-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5.5">
                    <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                </svg>
            </a></li>

            <!-- CART -->
            <li><a href="{{ route('cart.index') }}" class="relative hover:text-orange-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5.5">
                    <path d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                </svg>

                <div id="cart-count" class="absolute inline-flex items-center justify-center size-5 text-xs font-bold text-white bg-danger border-2 border-buffer rounded-full -top-2.5 -end-2.5 hidden">
                    0
                </div>
            </a></li>
        </ul>
    </div>
</nav>
