@extends('home')
@section('content')
	<div class="card">
		<div class="card-header ">
			<div class="text">
				{{ __('Show Category') }} : {{$category->name}}
			</div>
			<div>
				<form action="{{route('category.index')}}" class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search category name..."
						   aria-label="Search" name="name" value="{{app('request')->input('name')}}">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
			<div class="">
				<a href="{{route('category.create')}}">
					<button type="button" class="btn btn-primary">
						Add Category
					</button>
				</a>
			</div>

		</div>
		<div class="card-body">
			<div class="title-contact">
				<table class="table table-bordered table-hover " style="text-align: center;">
					<thead>
					<tr>
						<th>STT</th>
						<th>Products Name</th>
						<th>Price</th>
						<th>Quantity Products</th>
						<th colspan="2">Action</th>
					</tr>
					</thead>
					<tbody>
					@foreach($category->products as $index => $product)
						<tr>
							<td>{{$index + 1}}</td>
							<td>{{$product->name}}</td>
							<td>{{$product->price}}</td>
							<td>{{$product->quantity}}</td>
							<td>
								<a href="" class="text">
									<button type="button" class="btn btn-primary">
										Update
									</button>
								</a>
							</td>
							<td class="text">
								<form action="" method="POST">
									@method('DELETE')
									@csrf
									<button onclick="return confirm('Are you sure you want to delete this item?');"
											type="submit" class="btn btn-primary">Delete
									</button>
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
