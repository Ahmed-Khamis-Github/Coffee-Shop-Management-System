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
  @error('name')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  <div class="form-group">
    <label for="formGroupExampleInput2">price</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="price" value={{$product->price}}>
  </div>
  @error('price')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="form-group">
    <label for="formGroupExampleInput2">image</label>
    <input type="file" class="form-control" id="formGroupExampleInput2" name="image" value={{$product->image}}>
  </div>
  @error('image')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror

  <div class="form-group">
    <label for="formGroupExampleInput2">quantity</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="quantity" value={{$product->quantity}}>
  </div>
  @error('quantity')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror


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
  @error('category_id')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror


  <div class="form-group">

</div>

  
  <button type="submit" class="btn btn-primary m-2" >Update</button>
</form>
</div>
@endsection