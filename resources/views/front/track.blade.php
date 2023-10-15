@extends('layouts.front')
@section('content')
    <section class="ftco-aboat">

        <div class="container-wrap">
            <div class="row no-gutters d-md-flex align-items-center">

                <div class="col-md-12 appointment ftco-animate">
                    <h3 class="my-3">My orders</h3>

                    {{-- Form --}}
                    <form action="#" class="appointment-form col-6">
                        <div class="d-md-flex">
                            {{-- date form --}}
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date" placeholder="Date From">
                                </div>
                            </div>
                            {{-- date to --}}
                            <div class="form-group ml-md-4">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date" placeholder="Date To">
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- table --}}
                    <table class="table table-transparent">
                        <thead>
                          <tr class="order-table" >
                            <th scope="col" class="table-head">Order Date</th>
                            <th scope="col" class="table-head">Status</th>
                            <th scope="col" class="table-head">Amount</th>
                            <th scope="col" class="table-head">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>2015/12/5</td>
                            <td class="order-table">Processing</td>
                            <td class="order-table" >50 EGP</td>
                            <td class="order-table cancel-click" >Cancel</td>
                          </tr>
                          <tr>
                            <td>2015/12/5</td>
                            <td class="order-table" >Out for delievery</td>
                            <td class="order-table" >100 EGP</td>
                            <td class="order-table" > </td>
                          </tr>
                          <tr>
                            <td>2015/12/5</td>
                            <td class="order-table" >Done</td>
                            <td class="order-table" >70 EGP</td>
                            <td class="order-table" > </td>
                          </tr>
                        </tbody>
                    </table>

                    {{-- order details --}}
                    <div class="row">
                        <div class="col-md-3">
                          <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url(assets/front/images/menu-1.jpg);"></a>
                            <div class="text text-center pt-4">
                              <h3><a href="#">Coffee Capuccino</a></h3>
                              <p>A small river named Duden flows by their place and supplies</p>
                              <p class="price"><span>$5.90</span></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url(assets/front/images/menu-2.jpg);"></a>
                            <div class="text text-center pt-4">
                              <h3><a href="#">Coffee Capuccino</a></h3>
                              <p>A small river named Duden flows by their place and supplies</p>
                              <p class="price"><span>$5.90</span></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url(assets/front/images/menu-3.jpg);"></a>
                            <div class="text text-center pt-4">
                              <h3><a href="#">Coffee Capuccino</a></h3>
                              <p>A small river named Duden flows by their place and supplies</p>
                              <p class="price"><span>$5.90</span></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url(assets/front/images/menu-4.jpg);"></a>
                            <div class="text text-center pt-4">
                              <h3><a href="#">Coffee Capuccino</a></h3>
                              <p>A small river named Duden flows by their place and supplies</p>
                              <p class="price"><span>$5.90</span></p>
                            </div>
                          </div>
                        </div>   
                    </div>

             
                
                </div>
            </div>
            
        </div>
        
    </section>

      
 
@endsection
