@extends('layouts.dashboard')
@section('content')
		@csrf
		@method('PUT')
	<form>

		<div class="card-body">
			<div class="form-group">
				<label for="cateName">Name</label>
				<input disabled type="text" name="name" class="form-control" id="cateName" placeholder="Name" value="{{$category->name}}">
				@error('name')
					<div style="color: red; font-weight: bold"> {{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="cateSlug">Slug</label>
				<input disabled type="text" name="slug" class="form-control" id="cateSlug" placeholder="Slug" pattern="[A-Za-z0-9]+"
					onkeydown="if(['Space'].includes(arguments[0].code)){return false;}" value="{{$category->slug}}">
				@error('slug')
					<div style="color: red; font-weight: bold"> {{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea disabled name="description" class="form-control" rows="3" placeholder="Enter ..." style="height: 49px;">{{$category->description}}</textarea>
				@error('description')
					<div style="color: red; font-weight: bold"> {{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="cateImage">Image</label>
				{{--! <img src="" alt=""> --}}
				</div>
				@error('image')
					<div style="color: red; font-weight: bold"> {{ $message }}</div>
				@enderror
			</div>
		</div>
		</form>
@endsection
