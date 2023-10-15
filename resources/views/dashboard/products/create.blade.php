@extends('layouts.dashboard')
@section('content')
<div class="container">
    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
      @csrf
<div class="form-group">
    <label for="formGroupExampleInput">name</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="name">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">price</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="price">
    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">quantity</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="quantity">
    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">image</label>
    <input type="file" class="form-control" id="formGroupExampleInput2" name="image">
    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  
  <div class="form-group">
  <label for="Category_Name">Category</label>
                        <select class="custom-select"  name="category_id">
                            <option value="">Primary Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>

  
  <button type="submit" class="btn btn-primary m-2" >Create</button>
</form>
</div>
@endsection