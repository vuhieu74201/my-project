@extends('home')
@section('content')
	<div class="card">
		<div class="card-header "  >
			<div class="text">
				{{ __('Show Customers') }} : {{$customer->name}}
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
					<div class="title-contact">
						<table class="table table-hover" style="text-align: center;">
							<thead>
							<tr>
								<th scope="col">STT</th>
								<th scope="col">Order #</th>
								<th scope="col">Bill to Name</th>
								<th scope="col">Purchased on</th>
								<th scope="col">Status</th>
								<th scope="col" colspan="2">Actions</th>
							</tr>
							</thead>
							<tbody>
                                @foreach($customer->orders as $index => $order)
								<tr>
									<td>{{$index +1}}</td>
									<td>#{{$order->order_code}}</td>
									<td>{{$order->bill_name}}</td>
									<td>{{$order->updated_at}}</td>
									<td style="color: red;">
										@if($order->status == 0)
											Cancel
										@elseif($order->status == 1)
											Pending
										@else
											Complete
										@endif
									</td>

									<td>
										<a href="{{route('order.show',['order'=>$order->id])}}" class="">
											<button type="button" class="btn btn-outline-success">
												View
											</button>
										</a>
									</td>
									<td class="text">
										<form action="{{route('order.destroy',['order'=>$order->id])}}" method="POST">
											@method('DELETE')
											@csrf
											<button onclick="return confirm('Are you sure you want to delete this item?');"
													type="submit" class="btn btn-outline-danger">
												Delete
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

		</div>
	</div>

@stop
