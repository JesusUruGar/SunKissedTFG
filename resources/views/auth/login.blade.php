@extends('layouts.app')

@section('title', 'Login - SUNKISSED')

@section('content')

<div class="container mx-auto px-4 py-10">

    <h1 class="text-4xl font-bold text-center">Login</h1>

    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data" class="max-w-sm mx-auto mt-6 shadow-md p-10">

        @csrf

        <!-- ERRORS -->
        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100 mb-5">
                @foreach ($errors->all() as $error)
                    <li class="text-red-500 my-2">• {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- EMAIL -->
        <div class="mb-5">
            <label for="email" class="block mb-2.5 text-sm font-medium text-heading">
                Email
            </label>
            <input type="email" name="email" id="email" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="" value="{{ old('email') }}" required />
        </div>

        <!-- PASSWORD -->
        <div class="mb-5">
            <label for="password" class="block mb-2.5 text-sm font-medium text-heading">
                Contraseña
            </label>
            <input type="password" name="password" id="password" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="" value="" required />
        </div>

        <!-- SUBMIT -->
        <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 text-sm px-4 py-2.5 focus:outline-none flex items-center gap-1 cursor-pointer">
            Log In
        </button>

    </form>

</div>
@endsection
