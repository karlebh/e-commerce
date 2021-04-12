<x-all-layout>

	@if(session()->has('message'))
		<div class="text-center text-xl text-green-400">
			<p>{{ session()->get('message') }}</p>
		</div>
	@endif

	@if(session()->has('error'))
		<div class="text-center text-xl text-red-400">
			<p>{{ session()->get('error') }}</p>
		</div>
	@endif

	<div class="grid lg:grid-cols-2 gap-2 px-4">
		<x-payment />
		<x-checkout-orders />
	</div>
	@push('etra-js')
		<script type="text/javascript">
		    // Create an instance of the Stripe object with your publishable API key
		    var stripe = Stripe("sk_test_51IedGnIsVBaNe6Df1jMQUBVvez8VSZ7GFljvUMBCgJlGCLDKD2Mi7YIOdsrE1OX8jTFP6z25k0pMJRj4");
		    var checkoutButton = document.getElementById("stripe-checkout-button");

		    checkoutButton.addEventListener("click", function () {
		      fetch("/cart/checkout", {
		        method: "POST",
		      })
		        .then(function (response) {
		          return response.json();
		        })
		        .then(function (session) {
		          return stripe.redirectToCheckout({ sessionId: session.id });
		        })
		        .then(function (result) {
		          // If redirectToCheckout fails due to a browser or network
		          // error, you should display the localized error message to your
		          // customer using error.message.
		          if (result.error) {
		            alert(result.error.message);
		          }
		        })
		        .catch(function (error) {
		          console.error("Error:", error);
		        });
		    });

		  </script>
	@endpush
</x-all-layout>