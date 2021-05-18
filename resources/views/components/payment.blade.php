<div class="p-3 mx-auto mt-2 w-full">
	<div class="tab">
		<button class="tablinks" onclick="openMethod(event, 'Paystack')" id="defaultOpen" >Paystack</button>
		<button class="tablinks" onclick="openMethod(event, 'Stripe')">Stripe</button>
		<button class="tablinks" onclick="openMethod(event, 'Paypal')">Paypal</button>
	</div>

	<!-- Paystack Payment -->
	<div id="Paystack" class="tabcontent mt-10">

		<form method="POST" action="{{ route('paystack.pay') }}" accept-charset="UTF-8" 
		class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" role="form">
		<div class="col-md-8 col-md-offset-2">

			@auth()
			<div class="">
				<label class="block text-sm text-gray-00" for="name">Name</label>
				<input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" readonly placeholder="Your Name" aria-label="Name" value="{{ Auth::user()->name }}">
			</div>
			@endauth
			
			@guest()
			<div class="">
				<label class="block text-sm text-gray-00" for="name">Name</label>
				<input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Your Name" aria-label="Name" value="{{ old('name') }}">
				@error('name')
				<p class="text-sm text-red-400 font-bold mt-1">{{ $message }}</p>
				@enderror
			</div>
			@endguest

			@auth()
			<div class="mt-2">
				<label class="block text-sm text-gray-600" for="email">Email</label>
				<input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" aria-label="Email" value="{{ Auth::user()->email }}" readonly>
			</div>
			@endauth
			
			@guest

			<div class="mt-2">
				<label class="block text-sm text-gray-600" for="email">Email</label>
				<input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Your Email" aria-label="Email" value="{{ old('email') }}">
			</div>
			@error('email')
			<p class="text-sm text-red-400 font-bold mt-1">{{ $message }}</p>
			@enderror

			@endguest


			<input type="hidden" name="amount" value="{{ Cart::session('guest')->getTotal() * 100 * 480}}"> 
			<input type="hidden" name="quantity" value="1">
			<input type="hidden" name="currency" value="NGN">
			<input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" >
			<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
			{{ csrf_field() }} 


			<p>
				<button class="px-4 py-1 text-white text-xl tracking-wider bg-gray-900 rounded mt-3" type="submit" value="Pay Now!">
					Pay Now!
				</button>
			</p>
		</div>
	</form>
</div>

<div id="Stripe" class="tabcontent">
	<br>
	<h3 class="text-center text-xl text-blue-700 mt-8">Coming Soon!</h3>
	<br>
</div>

<div id="Paypal" class="tabcontent">
	<br>
	<h3 class="text-center text-xl text-blue-700 mt-8">Coming Soon!</h3>
	<br>
</div>
</div>

@push('extra-js')
<script>
		 // Tabs Js
		 function openMethod(evt, paymentMethod) {
		 	var i, tabcontent, tablinks;

			// Get all elements with class="tabcontent" and hide them
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			// Get all elements with class="tablinks" and remove the class "active"
			tablinks = document.getElementsByClassName("tablinks");
			let ids
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			// Show the current tab, and add an "active" class to the button that opened the tab
			document.getElementById(paymentMethod).style.display = "block";
			evt.currentTarget.className += " active";
		}

		document.getElementById("defaultOpen").click();

	</script>
	@endpush