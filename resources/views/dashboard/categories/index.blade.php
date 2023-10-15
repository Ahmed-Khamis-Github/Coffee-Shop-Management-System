@extends('layouts.dashboard')
@section('content')
	<!-- Default box -->


	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Categories</h3>

			<div class="card-tools">
				{{-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					<i class="fas fa-minus"></i>
				</button>
				<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
					<i class="fas fa-times"></i>
				</button> --}}
				<a href="{{ route('categories.create') }}" type="button" class="btn btn-block btn-primary my-2">Add category</a>
			</div>
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
						<th style="width: 30%">
							Description
						</th>
						<th style="width: 30%">
							Image
						</th>
						<th style="width: 20%">
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $key => $category)
						<tr>
							<td>
								{{ $key + 1 }}
							</td>
							<td>
								{{ $category->name }}
							</td>
							<td>
								{{ $category->description }}
							</td>
							<td>
									<img src="{{ asset("images/categories/$category->image") }}" class="img-size-64 img-bordered" >

							</td>
							<td class="project-actions text-right">
								<a class="btn btn-primary btn-sm" href="{{ route('categories.show', $category->id) }}">
									<i class="fas fa-folder">
									</i>
								</a>
								<a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category->id) }}">
									<i class="fas fa-pencil-alt">
									</i>
								</a>
								<form action="{{ route('categories.destroy', $category->id) }}" method="post"
									class="btn btn-danger btn-sm"style="padding: 0px">
									@csrf
									@method('delete')
									<label for="{{ 'del-' . $category->id }}" style="margin:0;padding:4px 8px;cursor:pointer">
										<i class="fas fa-trash"></i>
									</label>
									<button id="{{ 'del-' . $category->id }}" type="submit" style="display:none"></button>
								</form>
								</a>
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
