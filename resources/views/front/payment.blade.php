@extends('layouts.front')

@section('content')
	<section class="ftco-section">
		<div class="container-fluid">
			l;kajsd;flasdf
		</div>
	</section>

	<section class="ftco-section">
		<div class="container-fluid d-flex justify-content-around">


			{{-- <h1
					class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">
					Make A Payment</h1>
				@if (session()->has('success'))
					<div class="alert alert-success">
						{{ session()->get('success') }}
					</div>
				@endif --}}

			<form class="billing-form bg-transparent p-3 p-md-5" action="{{ route('checkout.card-payment') }}" method="POST"
				id="card-form">
				@csrf>
				<h3 class="mb-4 billing-heading">Billing Details</h3>
				<div class="row align-items-end">

					<div class="w-100"></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="card-name">Your name</label>
							<input type="text" name="user_name" value="{{ $name }}" id="card-name" class="form-control">
						</div>
					</div>

					<div class="w-100"></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="card-name">Your Mobile</label>
							<input type="text" name="mobile_number" value="{{ $mobile }}" id="card-name" class="form-control">
						</div>
					</div>
					<div class="w-100"></div>

					<div class="col-md-12">
						<div class="form-group">
							<label for="email">Address</label>
							<input type="text" name="user_address" value="{{ $address }}" id="email" class="form-control">
						</div>
					</div>
					<div class="w-100"></div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="card">Card details</label>

							<div class="bg-gray-100 p-6 rounded-xl">
								<div id="card"></div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary p-3 m-2">Pay
						👉</button>
				</div>
			</form>
	</section>
	<input type="hidden" id="PUBLISHABLE_KEY" name="STRIPE_KEY" value="{{ env('PUBLISHABLE_KEY') }}">
	<script src="https://js.stripe.com/v3/"></script>
	<script>
		let STRIPE_KEY = document.querySelector('#PUBLISHABLE_KEY').value;
		let stripe = Stripe(STRIPE_KEY)
		console.log(STRIPE_KEY);
		const elements = stripe.elements()
		const cardElement = elements.create('card', {
			style: {
				base: {
					fontSize: '24px',
					color:'rgba(255, 255, 255, 0.9)'
				}
			}
		})
		const cardForm = document.getElementById('card-form')
		const cardName = document.getElementById('card-name')
		cardElement.mount('#card')
		cardForm.addEventListener('submit', async (e) => {
			e.preventDefault()
			const {
				paymentMethod,
				error
			} = await stripe.createPaymentMethod({
				type: 'card',
				card: cardElement,
				billing_details: {
					name: cardName.value
				}
			})
			if (error) {
				console.log(error)
			} else {
				let input = document.createElement('input')
				input.setAttribute('type', 'hidden')
				input.setAttribute('name', 'payment_method')
				input.setAttribute('value', paymentMethod.id)
				cardForm.appendChild(input)
				cardForm.submit()
			}
		})
	</script>
	</div>
	</section>
@endsection
