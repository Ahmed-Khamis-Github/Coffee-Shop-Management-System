@extends('layouts.front')
@section('content')
    <section class="home-slider owl-carousel">

        <div class="slider-item" style="background-image: url(assets/front/images/bg_3.jpg);"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                    <div class="col-md-7 col-sm-12 text-center ftco-animate">
                        <h1 class="mb-3 mt-5 bread">Cart</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('carts.index') }}">Home</a></span>
                            <span>Cart</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr class="text-center">
                                        {{-- <td class="product-remove"><a href="#"><span class="icon-close"></span></a></td> --}}
                                        <form action="{{ route('carts.destroy', $item['id']) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <td class="product-remove "><button class="bg-transparent " style="border:none !important; cursor:pointer"><span
                                                        class="icon-close"></span></button></td>
                                        </form>

                                        <td class="image-prod">
                                            <div class="img"
                                                style="background-image:url(assets/front/images/menu-2.jpg);"></div>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{ $item['name'] }}</h3>
                                            <p>{{ $item['description'] }}</p>
                                        </td>

                                        <td class="price">${{ $item['price'] }}</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                {{-- <input type="text" name="quantity" class="quantity form-control input-number" value="{{ $item['quantity'] }}" min="1" max="100"> --}}
                                                <input type="number" name="quantity"
                                                    class="quantity form-control input-number"
                                                    value="{{ $item['quantity'] }}" min="1" max="100"
                                                    data-item-id="{{ $item['id'] }}"
                                                    data-item-price="{{ $item['price'] }}"

                                                    >

                                            </div>
                                        </td>

                                        <td class="total">${{ $item['price'] * $item['quantity'] }}</td>
                                    </tr><!-- END TR-->
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>${{ $totalPrice }}</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{ route('checkout.index') }}" class="btn btn-primary py-3 px-4">Proceed
                            to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>
    <style>
        .cart-list {
            overflow-x: auto;
        }
    </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.quantity').on('change', function () {
            const itemId = $(this).data('item-id');
            const newQuantity = $(this).val();
            const itemPrice = $(this).data('item-price');
            const totalCell = $(this).closest('tr').find('.total');
            const newTotal = itemPrice * newQuantity;
            if (!isNaN(newQuantity) && !isNaN(itemPrice)) {
                const newTotal = itemPrice * newQuantity;

            // Send an AJAX request to update the session data
            $.ajax({
                type: 'POST',
                url: '{{ route('carts.store') }}', // Replace with your update route
                data: {
                    _token: '{{ csrf_token() }}',
                    id: itemId,
                    quantity: newQuantity,

                },
                success: function (response) {
                    // Handle the response, e.g., update the total price
                    totalCell.text('$' + newTotal);
                    updateCartTotal();
                },
                error: function (error) {
                    console.log(error);
                }
            });
          }
        });
        function updateCartTotal() {
            let total = 0;
            $('.total').each(function() {
                const totalValue = parseFloat($(this).text().replace('$', ''));
                if (!isNaN(totalValue)) {
                    total += totalValue;
                }
            });

            $('.cart-total span:last').text('$' + total.toFixed(2)); // Update the total price in the "Cart Totals" section
        }

        // Initial calculation of the total price
        updateCartTotal();


    });



</script>
@endsection
