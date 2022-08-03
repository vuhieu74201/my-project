@extends('home')
@section('content')
	<div class="card">
		<div class="card-header " style ="display: flex ; justify-content: space-between" >
			<div class="text" style="font-size: 25px">
				{{ __('Show Product') }}
			</div>
			<div>
				<form  action="{{route('product.index')}}" class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search category name..."
						   aria-label="Search" name="name" value="{{app('request')->input('name')}}">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
			<div class="" style="">
				<a href="{{route('product.create')}}" class="">
					<button type="button" class="btn text btn-primary">
						Add Product
					</button>
				</a>
			</div>

		</div>
		<div class="card-body">
			<div class="title-contact">
				<table class="table table-bordered " style="text-align: center;">
					<thead>
					<tr>
						<th>
							STT
						</th>
						<th>Product Name</th>
						<th>Category Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Describe</th>
						<th colspan="2">
							action
						</th>
					</tr>
					</thead>
					<tbody>
					@foreach($products as $index => $product)
						<tr>
							<td>{{$index + 1}}</td>
							<td>{{$product->name}}</td>
							<td>{{$product->category->name}}</td>
							<td>
								{{$product->price}}
							</td>
							<td>{{$product->import_quantity}}</td>
							<td>{{$product->description}}</td>
							<td>
								<a href="" class="">
									<button type="button" class="btn btn-primary">
										Update
									</button>
								</a>
							</td>
							<td class="text">
								<form action="" method="POST">
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



