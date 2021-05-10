<x-all-layout>
	<div class="text-center mb-5">
		<div class="text-2xl font-bold text-red-500 mb-3">Test Credit Card Informations</div>

		<div class="mb-4">
			<h1 class="text-2xl font-bold">
			Flutterwave
			</h1>

			<p>Card Number: <span class="font-semibold text-xl">5531 88214 5214 2950</span></p>
			<p>CVV: <span class="font-semibold text-xl">564</span></p>
			<p>PIN: <span class="font-semibold text-xl">3310</span></p>
			<p>OTP: <span class="font-semibold text-xl">12345</span></p>
			<p>Expiry: <span class="font-semibold text-xl">09/32</span></p>
			<p>Card Type: <span class="font-semibold text-xl">Master</span></p>
		</div>

		<div class="mb-4">
			<h1 class="text-2xl font-bold">
			Paystack

			</h1>

			<p>Card Number: <span class="font-semibold text-xl">5060 6666 6666 6666 666</span></p>
			<p>CVV: <span class="font-semibold text-xl">123</span></p>
			<p>PIN: <span class="font-semibold text-xl">1234</span></p>
			<p>OTP: <span class="font-semibold text-xl">123456</span></p>
			<p>Expiry: <span class="font-semibold text-xl">05/22</span></p>
		</div>

		<article>
			<p>For more visit <a href="https://www.paystack.com/docs/payments/test-payments">Paystack</a> and <a href="https://www.developer.flutterwave.com/docs/test-cards">Flutterwave</a> </p>
		</article>
	</div>

	<div class="grid lg:grid-cols-2 gap-2 px-4">
		<x-checkout-orders />
		<x-payment />
	</div>
</x-all-layout>