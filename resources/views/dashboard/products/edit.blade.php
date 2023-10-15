@extends('layouts.dashboard')
@section('content')
<div class="container">
    <form method="post" action="{{route('products.update', $product->id)}}">
        @csrf
        @method('PUT')
<div class="form-group">
    <label for="formGroupExampleInput">name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="name" value={{$product->name}}>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">price</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="price" value={{$product->price}}>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">image</label>
    <input type="file" class="form-control" id="formGroupExampleInput2" name="image" value={{$product->image}}>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">quantity</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="quantity" value={{$product->quantity}}>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Category</label>
     
    <select class="custom-select" name="category_id">
     
      @foreach ($category as $category)
          <option value="{{ $category->id }}" @if ($category->id === $product->category_id) selected @endif>
              {{ $category->name }}
          </option>
      @endforeach
  </select> 
  </div>
  <div class="form-group">

</div>

  
  <button type="submit" class="btn btn-primary m-2" >Update</button>
</form>
</div>
@endsection