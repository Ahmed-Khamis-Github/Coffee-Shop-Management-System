@extends('layouts.front')
@section('content')
{{-- header section --}}
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url(assets/front/images/bg_1.jpg);">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">The Best Coffee Testing Experience</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            {{-- <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p> --}}
          </div>

				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(assets/front/images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>

				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image: url(assets/front/images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            {{-- <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p> --}}
          </div>

        </div>
      </div>
    </div>
  </section>

{{-- our history section --}}

<section class="ftco-about d-md-flex">
  <div class="one-half img" style="background-image: url(assets/front/images/about.jpg);"></div>
  <div class="one-half ftco-animate">
    <div class="overlap">
      <div class="heading-section ftco-animate ">
        <span class="subheading">Discover</span>
        <h2 class="mb-4">Our Story</h2>
      </div>
      <div>
        <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
      </div>
    </div>
  </div>
</section>
{{-- services info --}}
<section class="ftco-section ftco-services">
  <div class="container">
    <div class="row">
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-choices"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Easy to Order</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-delivery-truck"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Fastest Delivery</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-coffee-bean"></span></div>
          <div class="media-body">
            <h3 class="heading">Quality Coffee</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>






{{-- products list --}}

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Discover</span>
        <h2 class="mb-4">Our Products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
      </div>
    </div>

    <form class="heading-section ftco-animate text-center my-5" method="GET" action="search">
      @csrf
      <input type="search" placeholder="search here .." class="bg-transparent text-white" name="query">
      <button type="submit" class="btn btn-primary">search </button>

    </form>

    <div class="row">
      @foreach ($products as $product )
      <div class="col-md-3">
        <div class="menu-entry">
          <a href="#" class="img" style="background-image: url(assets/front/images/menu-1.jpg);"></a>
          <div class="text text-center pt-4">
            <h3><a href="#">{{$product->name}}</a></h3>
            <p>A small river named Duden flows by their place and supplies</p>
            <p class="price"><span>{{$product->price}}</span></p>
            <p><a href="#" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-center bg-black">
      {{$products->links()}}
    </div>

  </div>
</section>
@endsection
