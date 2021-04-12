<x-all-layout>

	<div class="flex flex-col ml-10">
		<p>Name: <span class="text-bold font-medium">{{ $product->name }}</span></p>
		<p><span>Priec: </span>{{ $product->price }}</p>
		<p><span>Amount Left: </span>{{ $product->quantity }}</p>
		
		<hr>
	
	</div>

	<div class="flex flex-col flex-wrap content-center mt-5 ">
		<button class="mb-2 bg-gray-500 text-white font-semibold block text-center py-2 px-4 w-40">Add To Cart</button>
		<button class="mb-2 bg-green-500 text-white font-semibold block text-center py-2 px-4 w-40">Order</button>
		<button class="mb-2 bg-green-500 text-white font-semibold block text-center py-2 px-4 w-40">Order via Paystack</button>
		<button class="mb-2 bg-green-500 text-white font-semibold block text-center py-2 px-4 w-40">Order via Flutterwave</button>
		<button class="mb-2 bg-green-500 text-white font-semibold block text-center py-2 px-4 w-40">Order via Paypal</button>
	</div>
	
</x-all-layout>