@extends('home')
@section('content')
	<div class="card">
		<div class="card-header " style ="display: flex ; justify-content: space-between" >
			<div class="text" style="font-size: 25px">
				{{ __('Show Category') }}
			</div>
			<div>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
			<div class="" style="">
				<a href="{{route('category.create')}}" class="">
					<button type="button" class="btn text btn-primary">
						Add Category
					</button>
				</a>
			</div>

		</div>
		<div class="card-body">
			@if (Session::has('success'))
				<div class="alert alert-success">
					<p>{{ Session::get('success') }}</p>
				</div><br/>
			@endif
			@if (Session::has('error'))
				<div class="alert alert-danger">
					<p>{{Session::get('error') }}</p>
				</div><br/>
			@endif
			<div class="title-contact">
				<table class="table table-bordered " style="text-align: center;">
					<thead>
					<tr>
						<th>
							STT
						</th>
						<th>Name</th>
						<th>Quantity Products</th>
						<th colspan="3">
							Action
						</th>
					</tr>
					</thead>
					<tbody>
					@foreach($categories as $index => $category )
					<tr>
						<td>{{$index+1}}</td>
						<td>{{$category->name}}</td>
						<td>
							{{ "fix"}}
						</td>
						<td>
							<a href="{{route('category.show',['category'=>$category->id])}}" class="text">
								<button type="button" class="btn btn-primary">
									Show
								</button>
							</a>
						</td>
						<td>
							<a href="{{route('category.edit',['category'=>$category->id])}}" class="text">
								<button type="button" class="btn btn-primary">
									Update
								</button>
							</a>
						</td>
						<td class="text">
							<form action="{{route('category.destroy',['category'=>$category->id])}}" method="POST">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-primary">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop