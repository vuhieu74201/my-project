@extends('home')
@section('content')
	<div class="card">
		<div class="card-header ">
			<div class="text">
				{{ __('Show Order') }}
			</div>
			<div class="" style="">
				<a href="{{route('order.create')}}" class="">
					<button type="button" class="btn btn-primary">
						Add Order
					</button>
				</a>
			</div>
		</div>
		<div class="card-body d-flex">
			<form action="" class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search Order name..."
					   aria-label="Search" name="name" value="{{app('request')->input('name')}}">
				<div class="search-date">from</div>
				<input class="form-control me-2" type="date" aria-label="Search"
					   name="fromDate" value="{{app('request')->input('fromDate')}}">
				<div class="search-date">to</div>
				<input class="form-control me-2" type="date" aria-label="Search"
					   name="toDate" value="{{app('request')->input('toDate')}}">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
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
				<table class="table table-hover" style="text-align: center;">
					<thead>
					<tr>

						<th scope="col">STT</th>
						<th scope="col">Order #</th>
						<th scope="col">Bill to Name</th>
						<th scope="col">Purchased on</th>
						<th scope="col">Subtotal</th>
						<th scope="col">Status</th>
						<th scope="col" colspan="2">Actions</th>
					</tr>
					</thead>
					<tbody>
					@foreach($orders as $index => $order)
						<tr>
							<td>{{$index+1}}</td>
							<td>#{{$order->order_code}}</td>
							<td>{{$order->bill_name}}</td>
							<td>{{$order->created_at}}</td>
							<td></td>
							@if($order->status == 0)
								<td>Cancel</td>
							@elseif($order->status == 1)
								<td>Pending</td>
							@else
								<td>Complete</td>
							@endif
							<td>
								<a href="{{route('order.show',['order'=>$order->id])}}" class="">
									<button type="button" class="btn btn-primary">
										View
									</button>
								</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
