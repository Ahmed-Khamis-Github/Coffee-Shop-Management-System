@extends('layouts.front')
@section('content')
	<section class="home-slider owl-carousel">

		<div class="slider-item" style="background-image: url(assets/front/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center">

					<div class="col-md-7 col-sm-12 text-center ftco-animate">
						<h1 class="mb-3 mt-5 bread">Checkout</h1>
						<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
							<span>Checout</span>
						</p>
					</div>

				</div>
			</div>
		</div>
	</section>











	<section class="ftco-section">
		<div class="container-fluid">
			<div class="row d-flex justify-content-around">

				<form class="col-xl-8 ftco-animate fadeInUp ftco-animated d-flex flex-column">
					<div action="#" class="billing-form ftco-bg-dark p-3 p-md-5">
						<h3 class="mb-4 billing-heading">Billing Details</h3>
						<div class="row align-items-end">
							<div class="col-md-12">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" placeholder="">
								</div>
							</div>

							<div class="w-100"></div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="streetaddress">Address</label>
									<input type="text" class="form-control" placeholder="House number and street name">
								</div>
							</div>

							<div class="w-100"></div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" class="form-control" placeholder="">
								</div>
							</div>

							{{-- <div class="w-100"></div>
							<div class="col-md-12">
								<div class="form-group mt-4">
									<div class="radio">
										<label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										<label><input type="radio" name="optradio"> Ship to different address</label>
									</div>
								</div>
							</div> --}}
						</div>
					</div><!-- END -->
					<div class="row justify-content-end my-4 px-0">
						<div class="col-md-6 d-flex">
							<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
								<h3 class="billing-heading mb-4">Cart Total</h3>
								<p class="d-flex total-price">
									<span>Total</span>
									<span>$17.60</span>
								</p>
								<hr>
								<h3 class="billing-heading mb-4">Payment Method</h3>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2">Cash</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<div class="radio">
											<label><input type="radio" name="optradio" class="mr-2"> Visa</label>
										</div>
									</div>
								</div>
								<p><a href="#" class="btn btn-primary py-3 px-4">Place an order</a></p>
							</div>
						</div>
					</form>

					<!-- .col-md-8 -->
			</div>
		</div>
		</div>

		</div>
		</div>
	</section>
@endsection
