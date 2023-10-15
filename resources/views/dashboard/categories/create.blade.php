@extends('layouts.dashboard')
@section('content')
	<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="cateName">Name</label>
				<input type="text" name="name" class="form-control" id="cateName" placeholder="Name">
			</div>
			<div class="form-group">
				<label for="cateSlug">Slug</label>
				<input type="text" name="slug" class="form-control" id="cateSlug" placeholder="Slug" pattern="[A-Za-z0-9]+" onkeydown="if(['Space'].includes(arguments[0].code)){return false;}">
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea name="description" class="form-control" rows="3" placeholder="Enter ..." style="height: 49px;"></textarea>
			</div>
			<div class="form-group">
				<label for="cateImage">Image</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="image" class="custom-file-input" id="cateImage">
						<label class="custom-file-label" for="cateImage">Category image</label>
					</div>
					<div class="input-group-append">
						<span class="input-group-text">Upload</span>
					</div>
				</div>
			</div>
		</div>
		<!-- /.card-body -->
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
@endsection
