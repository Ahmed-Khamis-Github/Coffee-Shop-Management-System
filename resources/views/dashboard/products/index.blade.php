@extends('layouts.dashboard');
@section('content');


  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
          
            <a href="{{ route('products.create') }}" type="button" class="btn btn-inline btn-primary col-2 ">Add Product</a>
          
              <a href="{{ route('archive') }}" type="button" class="btn btn-inline btn-primary col-2">Archive</a>
            
          </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                     Name
                    </th>
                    <th style="width: 20%">
                      Price
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th style="width: 20%" class="text-center">
                      image
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th >
                     
                    </th>
                   
                </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                    <td>
                        #
                    </td>
                    <td>
                        {{$product->name}}
                    </td>
                    <td>
                      {{$product->price}}
                    </td>
                    <td>
                      {{$product->quantity}}
                    </td>
                    <td class="text-center">  <img src="{{ asset('images/product_image/'.$product->image) }}"  alt="" height="50px"> </td>
                    <td class="project-state">
                      @if($product->quantity>0)
                        <span class="badge badge-success">Available</span>
                      @else
                        <span class="badge badge-success">Unavailable</span>
                      @endif
                    </td>

                    <td class="project-actions text-right d-flex align-items-center" >
                        <a class="btn btn-info btn-sm mr-3" href="{{route('products.edit' , $product->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                          <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" >  <i class="fas fa-trash" >
                            </i>Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="d-flex justify-content-center w-100">
      {{$products->links()}}
    </div>
  </section>
  @stop