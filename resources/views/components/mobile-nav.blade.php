<div class="lg:hidden">
	<div class="flex flex-col gap-10 p-6 bg-gray-200">
		<div class="">
			<a href="/"><h1 class="font-bold text-2xl">E Commerce</h1></a>
		</div>

		<div class="md:flex md:justify-around">
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
<div class="flex flex-col gap-2 flex-wrap justify-around p-4">
	<a href="{{ route('home') }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4 md:pl-20">Random Products</a>
	<a href="{{ route('category.show', 1) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4 md:pl-20">Shoes</a>
	<a href="{{ route('category.show', 2) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4 md:pl-20">Bags</a>
	<a href="{{ route('category.show', 3) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4 md:pl-20">Watch</a>
	<a href="{{ route('category.show', 4) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4 md:pl-20">Tops</a>
	<a href="{{ route('category.show', 5) }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4 md:pl-20">Knickers</a>
</div>
</div>