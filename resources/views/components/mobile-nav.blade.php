<div class="lg:hidden">
	<div class="flex flex-col gap-10 p-6 bg-gray-200">
		<div class="flex justify-between px-4" x-data"{ open: false}">
			<a href="/"><h1 class="font-bold text-2xl">E Commerce</h1></a>

			 <svg id="hambuger" class="-mb-2 h-6 w-10 lg:hidden" stroke="currentColor" fill="none" viewBox="0 0 24 24">
	            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
	            <path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
	        </svg>
		</div>

		<div class="flex items-baseline justify-between">

			@if(! \Cart::session('guest')->isEmpty())
			<a href="{{ route('checkout.index') }}" class="text-md font-bold">Checkout</a>
			@endif

			@guest()
			<a href="{{ route('login') }}" class="text-md font-bold">Login</a>
			<a href="{{ route('register') }}" class="text-md font-bold">Register</a>
			@endguest

			@auth()
			<a href="{{ route('profile.show', Auth::user()->name) }}" 
				class="text-md font-bold ">
				{{ Auth::user()->name }}
			</a>
			<a 
			href="{{ route('logout') }}" 
			onclick="event.preventDefault();
			document.getElementById('logoutForm').submit()"
			class="text-md font-bold"
			>Log Out</a>
			<form class="hidden" method="POST" 
			action="{{ route('logout') }}" id="logoutForm">
			@csrf
		</form>
		@endauth

		<a href="{{ route('cart.index') }}" class="relative text-md font-bold mr-4">
			Cart
			@if(! \Cart::session('guest')->isEmpty())
			<span class="font-extrabold rounded-full w-7 text-center bg-red-600 text-white absolute bottom-1 left-9">
				{{ \Cart::session('guest')->getContent()->count() }}
			</span>
			@endif
		</a>
	</div>
</div>

{{-- Navigaton Link by the left --}}
<div id="mobileNavBar" class="hidden flex-col gap-2 flex-wrap justify-around p-4">
	<a href="{{ route('home') }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4 md:pl-20">Random Products</a>
	 @forelse(\App\Models\Category::take(4)->get() as $category)
        <a href="{{ route('category.show', $category->slug) }}"  class="font-bold text-gray-50 bg-green-500 py-3 px-4 md:pl-20">{{ $category->name }}</a>
    @empty
        <p>No new category</p>
    @endforelse
</div>
</div>

@push('extra-js')
<script>
	document.getElementById('hambuger')
		.onclick = () => {
			if (document.getElementById('mobileNavBar').classList.contains('hidden')) {
				document.getElementById('mobileNavBar').classList.replace('hidden', 'flex')
			} else {
				document.getElementById('mobileNavBar').classList.replace('flex', 'hidden')
			}
		}
</script>
@endpush