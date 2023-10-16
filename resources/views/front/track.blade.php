@extends('layouts.front')
@section('content')
    <section class="ftco-aboat">

        <div class="container-wrap">
            <div class="row no-gutters d-md-flex align-items-center">

                <div class="col-md-12 appointment ftco-animate">
                    <h3 class="my-3">My orders</h3>

                    {{-- Form --}}
                    <form method="GET"  action="/myOrders/filter" class="appointment-form col-6" >
                      @csrf
                        <div class="d-md-flex">
                            {{-- date form --}}
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date" placeholder="Date From" name="start_date" autocomplete="off">
                                </div>
                            </div>
                            {{-- date to --}}
                            <div class="form-group ml-md-4">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text" class="form-control appointment_date" placeholder="Date To" name="end_date" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group ml-md-4"> 
                          
                            <button class="btn btn-primary btn-outline-primary mt-3 w-50" type="submit">Filter</button>
                           

                           
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
                          @foreach ($orders as  $order)
                            
                            <tr>
                            <td>{{$order->created_at->format('y-m-d')}}</td>
                            <td class="order-table">{{$order->order_status}}</td>
                            <td class="order-table" >{{$order->total}}</td>
                            <td>
                              @if($order->order_status === 'Awaiting_Approval')
                              
                                <form method="post" action="{{route('myOrderUpdate' , $order->id)}}">
                                  @csrf
                                  @method('put')
                                  <button class="order-table btn btn-primary cancel-click"> Cancel </button>
                                </form>
                              
                              
                              @endif
            <button class="btn btn-link toggle-details" data-order-id="{{$order->id}}">View Details</button>
                            </td>      
                          </tr>
                          {{-- // row to display order details --}}
                          <tr class="details-row" id="details-row-{{$order->id}}" style="display: none;">
                            <td colspan="4">
                              <div class="order-details">
                                  @foreach ($orderDetails as $orderDetail)
                                      @if ($orderDetail->order_id === $order->id)
                                          <div class="row">
                                              <div class="col-md-3">
                                                  <div class="menu-entry">
                                                      <a href="#" class="img" style="background-image: url(assets/front/images/menu-4.jpg);"></a>
                                                      <div class="text text-center pt-4">
                                                          <h3><a href="#">{{$orderDetail->product_name}}</a></h3>
                                                          <p class="price"><span>{{$orderDetail->price}}</span></p>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      @endif
                                  @endforeach
                              </div>
                          </td>

                          </tr>
                          @endforeach
                      
                            
                   
                        </tbody>
                    </table>           
                
                </div>
            </div>
            
        </div>
        
    </section>
@endsection


{{-- //java script --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const toggleButtons = document.querySelectorAll('.toggle-details');
      toggleButtons.forEach(function(button) {
          button.addEventListener('click', function() {
              const orderId = this.getAttribute('data-order-id');
              const detailsRow = document.querySelector('#details-row-' + orderId);
              detailsRow.style.display = (detailsRow.style.display === 'none') ? 'table-row' : 'none';
          });
      });
  });
</script>