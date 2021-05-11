<x-all-layout>
	<x-jet-validation-errors class="mb-4" />

	<form action="{{ route('product.store') }}" method="POST" class="px-4">
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
				@forelse(\App\Models\Category::take(4)->get() as $category)
					<option value="{{ $category->id }}" class="font-bold text-gray-50 bg-green-500 py-3 px-4">{{ $category->name }}</option>
				@empty
					<option>No new category</option>
				@endforelse
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