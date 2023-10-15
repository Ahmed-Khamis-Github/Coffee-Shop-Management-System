 @extends('layouts.dashboard')

 @section('content')
     <!-- Default box -->

     <div class="card-body p-0">
         <table class="table table-striped projects">
             <thead>
                 <tr>
                     <th style="width: 1%">
                         #
                     </th>
                     <th style="width: 20%">
                         Customer
                     </th>
                     <th style="width: 20%">
                         Mobile Number
                     </th>
                     <th style="width: 20%">
                         Location
                     </th>
                     <th style="width: 8%" class="text-center">
                         Status
                     </th>
                     <th style="width: 20%">
                     </th>
                 </tr>
             </thead>
             <tbody>

                 @foreach ($orders as $order)
                     <tr>
                         <td>
                             #
                         </td>
                         <td>
                             <a>
                                 {{ $order->user_name }}
                             </a>
                             <br />
                             <small>
                                 Created 01.01.2019
                             </small>
                         </td>
                         <td>
                             {{-- <ul class="list-inline">
                            
                            
                           
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp">
                                <img alt="Avatar" class="table-avatar" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp">
                                <img alt="Avatar" class="table-avatar" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp">
                                <img alt="Avatar" class="table-avatar" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp">
                                
                            </li>

                           
                        </ul> --}}

                             <span class="text-center">{{ $order->mobile_number }}</span>
                         </td>
                         <td class="project_progress">
                             <a>
                                 {{ $order->user_address }}
                             </a>
                         </td>
                         <td class="project-state">
                             <span class="badge badge-success">{{ $order->order_status }}</span>
                         </td>
                         {{-- <td class="project-actions text-right">
                             <a class="btn btn-primary btn-sm" href="{{ route('online.show', $order->id) }}">
                                 <i class="fas fa-folder">
                                 </i>
                                 View
                             </a>
                             <form action="{{ route('online.update', $order->id) }}" method="post">
                                 @csrf
                                 @method('put')
                                 <button class="btn btn-success btn-sm">
                                     <i class="fas fa-pencil-alt">
                                     </i>
                                     Take
                                 </button>
                             </form>
                             <form action="{{ route('online.destroy', $order->id) }}" method="post">
                                 @csrf
                                 @method('delete')
                                 <button class="btn btn-danger btn-sm" type="submit">
                                     <i class="fas fa-trash">
                                     </i>
                                     Cancel
                                 </button>
                             </form>
                         </td> --}}

                         <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('online.show', $order->id) }}">
                                <i class="fas fa-folder"></i> View
                            </a>

                            @if ($order->order_status==="Awaiting_Approval")
                            <form action="{{ route('online.update', $order->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('put')
                                <button class="btn btn-dark btn-sm">
                                    <i class="fas fa-pencil-alt"></i> Take Order
                                </button>
                            </form> 

                            <form action="{{ route('online.destroy', $order->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash"></i> Cancel
                                </button>
                            </form>
                            @endif

                            @if ($order->order_status==="Working_On_It")
                            <form action="{{ route('online.update', $order->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('put')
                                <button class="btn btn-success btn-sm">
                                    <i class="fas fa-pencil-alt"></i> Finished
                                </button>
                            </form> 
                            @endif


                            @if ($order->order_status==="delivered")
                            <form action="{{ route('online.update', $order->id) }}" method="post" style="display: inline-block;">
                                @csrf
                                @method('put')
                                <button class="btn btn-success btn-sm" disabled>
                                    <i class="fas fa-pencil-alt"></i> Finished
                                </button>
                            </form> 
                            @endif
                           
                            
                        </td>
                        
                     </tr>
                 @endforeach

             </tbody>
         </table>
     </div>
     <!-- /.card-body -->
     </div>
     <!-- /.card -->
 @endsection
