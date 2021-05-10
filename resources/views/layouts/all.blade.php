<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Stripe --}}
        <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
        <script src="https://js.stripe.com/v3/"></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/extra.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <header class="shadow-md mb-10">
                <div class="hidden lg:block">
                    <div class="flex justify-between align-baseline p-6 bg-gray-200">
                        <div class="">
                            <a href="/"><h1 class="font-bold text-2xl">E Commerce</h1></a>
                        </div>

                        <div class="">
                            <a href="{{ route('cart.index') }}" class="mr-8 relative text-md font-bold">
                            Cart
                             @if(! \Cart::session('guest')->isEmpty())
                                <span class="font-extrabold rounded-full w-7 text-center bg-red-600 text-white absolute bottom-1 left-9">{{ \Cart::session('guest')->getContent()->count() }}</span>
                            @endif
                            </a>
                            
                        @if(! \Cart::session('guest')->isEmpty())
                        <a href="{{ route('checkout.index') }}" class="mr-5 text-md font-bold">Checkout</a>
                        @endif

                        @guest()
                            <a href="{{ route('login') }}" class="mr-5 text-md font-bold">Login</a>
                            <a href="{{ route('register') }}" class="mr-5 text-md font-bold">Register</a>
                        @endguest

                        @auth()
                            <a href="{{ route('profile.show', Auth::user()->name) }}" 
                                class="mr-5 text-md font-bold ">
                                {{ Auth::user()->name }}
                            </a>
                            <a 
                            href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                                    document.getElementById('logoutForm').submit()"
                                        class="mr-5 text-md font-bold"
                                        >Log Out</a>
                            <form class="hidden" method="POST" 
                            action="{{ route('logout') }}" id="logoutForm">
                                @csrf
                            </form>
                        @endauth

                        </div>
                    </div>

                    {{-- Navigaton Link by the left --}}
                    <div class="flex flex-wrap justify-around p-2">
                        <a href="{{ route('home') }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4 corners">Random Products</a>
                        <a href="{{ route('category.show', 1) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4">Shoes</a>
                        <a href="{{ route('category.show', 2) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4">Bags</a>
                        <a href="{{ route('category.show', 3) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4">Watches</a>
                        <a href="{{ route('category.show', 4) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4">Tops</a>
                        <a href="{{ route('category.show', 5) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4">Knickers</a>
                    </div>
                </div>

                <x-mobile-nav />
            </header>

            <x-session-messages />
            
            <!-- page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="h-auto p-10 bg-gray-300 w-full text-center mt-40">
                <h1 class="font-bold text-xl">&copy; E-Commerce {{ Date('Y') }}</h1>
            </footer>
        </div>
         @stack('modals')
         @stack('extra-js')

        @livewireScripts
    </body>
</html>
