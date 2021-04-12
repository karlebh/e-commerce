<div>
		{{-- <div class="flex justify-around">
			<p>Name: <span>{{ $item->name }}</span></p>
			<p>Price: <span>${{ $item->price }}</span></p>
			<p>Quantity: <span>${{ $item->quantity }}</span></p>
		</div> --}}

		<table class="mx-auto mt-20">
			<caption class="text-4xl font-semibold mb-5">Orders</caption>
			<hr class="bg-black">
		  <thead>
		    <tr>
		      {{-- <th class="w-1/4 ...">Image</th> --}}
		      <th class="w-1/4 ...">Name</th>
		      <th class="w-1/4 ...">Price</th>
		      <th class="w-1/4 ...">Quantity</th>
		      <th class="w-1/4 ...">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach(Cart::session('guest')->getContent() as $item)
		    <tr>
		    	{{-- <td class="w-1/4 ..."></td> --}}
				<td class="w-1/4 text-justify ...">{{ $item->name }}</td>
				<td class="w-1/4 text-center ...">${{ $item->price }}</td>
				<td class="w-1/4 text-center ...">{{ $item->quantity }}</td>
				<td class="w-1/4 text-center ...">
					<form action="{{ route("cart.destroy", $item->id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="text-md text-red-500">
							remove
						</button>
					</form>
				</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		<br>
		<br>
		<br>
		<div class="text-center">
			<h1 class="text-green-600 text-4xl font-extrabold">Total: ${{ Cart::session('guest')->getTotal()}}</h1>
		</div>
	
</div>