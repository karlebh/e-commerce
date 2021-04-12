<x-all-layout>

	<div class="mx-auto text-center">
		@if($cartContents->count() > 0)
			<div class="mb-4">
				<a href="{{ route('checkout.index') }}" class="ml-4 px-4 py-2 font-bold text-black border-gray-700 border-2 mt-4 bg-gray-100">Proceed to Checkout</a>
			</div>
		@else
			<div class="mb-4">
				<a href="{{ route('home') }}" class="ml-4 px-4 py-2 font-bold text-black border-gray-700 border-2 mt-4 bg-gray-100">Add items to cart</a>
			</div>
		@endif

		<p class="font-extrabold text-xl">Total: ${{ \Cart::getTotal() }}</p>
		{{-- <p>{{ \Cart::getSubTotal() }}</p> --}}
	</div>

	<div class="flex flex-wrap justify-center">
		@forelse($cartContents as $item)
			<div class="w-60 h-40 bg-green-400 m-4 text-center p-3">
				<p>Name: <span class="font-medium font-bold text-white">{{ $item->name }}</span></p>
				<p>Pice:  <span class="font-medium font-bold text-white">${{ $item->price }}</span></p>
				<p>Quantity: <span class="font-medium font-bold text-white">{{ $item->quantity }}</span></p>

				<form action="">
					Quantity 
					<select name="quantity" id="" onchange="updateQuantity()">
					</select>
				</form>
				<form action="{{ route("cart.destroy", $item->id) }}" method="POST">
					@csrf
					@method('DELETE')
				<button type="submit" class="ml-4 px-4 py-2 mt-5 font-bold text-black border-gray-700 border-2 bg-gray-100 ">Remove From Cart</button>

			</form>
			</div>


		@empty
			<p class="text-center text-2xl">No item(s) in cart</p>
		@endforelse
	</div>


<hr>
<hr>
<hr>

@push('extra-js')
@endpush
</x-all-layout>