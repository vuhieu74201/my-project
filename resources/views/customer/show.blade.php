@extends('home')
@section('content')
	<div class="card">
		<div class="card-header "  >
			<div class="text">
				{{ __('Show Customers') }} : {{$customer->name}}
			</div>
			<div>
				<form  action="{{route("customer.index")}}" class="d-flex" role="search">
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
			<div class="card-body">
				<div>Full name : {{$customer->name }}</div>
				<div>Phone : {{$customer->UserProfile->phone ?? null}}</div>
				<div>
					{{ __("Gender :") }}
					@if ($customer->UserProfile != null)
						@if($customer->UserProfile->gender == 0)
							{{__("FeMale")}}

						@else
							{{__("Male")}}
						@endif
					@endif
				</div>
				<div>Address : {{$customer->UserProfile->address ?? null}}</div>
			</div>
			<div class="card">
				<div class="card-header text">
					Show Orders By : {{$customer->name}}
				</div>
				<div class="title-contact card-body">
					<table class="table table-hover" style="text-align: center;">
						<thead>
						<tr>
							<th>STT</th>
							<th>Order Name </th>
							<th>Total price</th>
							<th>Date buy</th>
							<th colspan="1">
								Action
							</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td></td>
							<td>
								<a href="" class=""></a>
							</td>
							<td></td>
							<td></td>
							<td class="text">
								<form action="" method="POST">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-primary">+</button>
								</form>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>

@stop
