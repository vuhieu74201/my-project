@extends('home')
@section('content')
	<div class="card">
		<div class="card-header ">
			<div class="text">
				{{ __('Show Customers') }}
			</div>
			<div>
				<form action="{{route("customer.index")}}" class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search customers name..."
						   aria-label="Search" name="name" value="{{app('request')->input('name')}}">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
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
				<table class="table table-bordered table-hover " style="text-align: center;">
					<thead>
					<tr>
						<th>STT</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Address</th>
						<th colspan="1">Action</th>
					</tr>
					</thead>
					@foreach($customers as $index => $customer)
						<tbody>
						<tr>
							<td>{{$index+1}}</td>
							<td>
								<a href="{{route("customer.show",['customer'=>$customer->id])}}" class="">
									{{$customer->name}}
								</a>
							</td>
							<td>{{$customer->email}}</td>
							<td>{{$customer->UserProfile->phone ?? null }}</td>
							<td>{{$customer->UserProfile->address ?? null}}</td>
							<td class="text">
								<form action="{{route("customer.destroy",['customer'=>$customer->id])}}" method="POST">
									@method('DELETE')
									@csrf
									<button onclick="return confirm('Are you sure you want to delete this item?');"
											type="submit" class="btn btn-primary">Delete
									</button>
								</form>
							</td>
						</tr>
						</tbody>
					@endforeach
				</table>
			</div>
		</div>
	</div>

@stop
