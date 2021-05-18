<div class="flex flex-wrap justify-center">
	@forelse($products as $product)
	<div class="">
				<div class="w-60 h-40 bg-green-400 m-4 text-center p-3">
					<p>Name: <span class="font-medium font-bold text-white">{{ $product->name }}</span></p>
					<p>Pice:  <span class="font-medium font-bold text-white">${{ $product->price }}</span></p>
					<p>Amount Left: <span class="font-medium font-bold text-white">{{ $product->quantity }}</span></p>
				</div>

			<form action="{{ route('cart.store') }}" method="POST">

				@csrf
				<input type="hidden" name="id" value="{{ $product->id }}">
				<input type="hidden" name="name" value="{{ $product->name }}">
				<input type="hidden" name="price" value="{{ $product->price }}">
				<input type="hidden" name="quantity" value="{{ $product->quantity }}">
				<input type="hidden" name="associatedModel" value="{{ 'App\Models\Product' }}">
				<input type="hidden" name="attributes['color']" value="red">

				<button type="submit" class="ml-4 px-4 py-2 font-bold text-black border-gray-700 border-2 ">Add to Cart</button>

			</form>
		</div>
	@empty
	<p class="text-center text-2xl mx-auto">No product(s) in this category</p>
	@endforelse

	<div class="mt-5">
		{{ $products->links() }}
	</div>
</div>
