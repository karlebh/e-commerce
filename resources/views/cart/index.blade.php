<x-all-layout>

	<div class="mx-auto text-center mt-8">
		@if($cartContents->count() > 0)
			<div class="mb-4">
				<a href="{{ route('checkout.index') }}" class="ml-4 px-4 py-2 font-bold text-black border-gray-700 border-2 mt-4 bg-gray-100">Proceed to Checkout</a>
			</div>
		@else
			<div class="mb-4">
				<a href="{{ route('home') }}" class="ml-4 px-4 py-2 font-bold text-black border-gray-700 border-2 mt-4 bg-gray-100">Add items to cart</a>
			</div>
		@endif

		<p class="font-extrabold text-xl">Total: ${{ \Cart::session('guest')->getTotal() }}</p>
	</div>

	<div class="flex flex-wrap justify-center gap-8 font-">
		@forelse($cartContents as $item)
			<div class="w-60 h-40 bg-green-400 m-4 text-center p-3">
				<p class="mb-4">Name: <span class="font-bold text-white">{{ $item->name }}</span></p>
				<p>Pice:  <span class="font-bold text-white">${{ $item->price }}</span></p>

				<form class="mt-3">
					Quantity 
					<select name="quantity" data-id="{{ $item->id }}" data-quantity="{{ $item->quantity }}" 
						class="quantities">
						@for ($i = 1; $i < 10 ; $i++)
							<option value="{{ $i }}" {{ $item->quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
						@endfor
					</select>
				</form>

				<form action="{{ route("cart.destroy", $item->id) }}" method="POST">
					@csrf
					@method('DELETE')
				<button type="submit" class="ml-4 px-4 py-2 mt-2 font-bold text-black border-gray-700 border-2 bg-gray-100 ">Remove From Cart</button>

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
	<script>

		const Quantities = document.querySelectorAll('.quantities')
		Quantities.forEach(qty => qty.addEventListener('change', () => {
			const productId = qty.getAttribute('data-id')
			const newQuantity = qty.value
			axios.post(`/cart/${productId}`, {
				quantity: newQuantity,
				_method: 'patch'
			})
			.then(response => location.reload())
		}))

	</script>
@endpush
</x-all-layout>