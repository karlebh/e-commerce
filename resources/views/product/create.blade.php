<x-all-layout>
	<x-jet-validation-errors class="mb-4" />

	<form action="{{ route('product.store') }}" method="post" class="px-4">
		@csrf

		<div>
			<x-jet-label for="name" value="{{ __('Product Name') }}" />
			<x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
		</div>

		<div>
			<x-jet-label for="description" value="{{ __('Description') }}" />
			<textarea id="description" class="block mt-1 w-full" type="text" name="description" value="old('description')" required autofocus autocomplete="name"></textarea>
		</div>

		<div>
			<x-jet-label for="name" value="{{ __('Product Quantity') }}" />
			<x-jet-input id="name" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" required autofocus autocomplete="quantity" />
		</div>

		<div>
			<x-jet-label for="name" value="{{ __('category') }}" />
			<select name="category_id" id="">
				<option value="1">Shoes</option>
				<option value="2">Bags</option>
				<option value="3">Watches</option>
				<option value="4">Tops</option>
				<option value="5">Knickers</option>
			</select>
		</div>

		<div>
			<x-jet-label for="price" value="{{ __('Price') }}" />
			<x-jet-input id="price" class="block mt-1 w-full" type="number" min="10" name="price" :value="old('price')" required autofocus autocomplete="name" />
		</div>

		<x-jet-button class="ml-4 mt-4">
			{{ __('Add Product') }}
		</x-jet-button>
	</form>

</x-all-layout>