@extends('home')
@section('content')
	<div class="card">
		<div class="card-header ">
			<div class="text">
				{{ __('Show Order') }} : {{$order->bill_name}}
			</div>
		</div>
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
			<div>Order code : #{{$order->order_code}}</div>
			<div>Bill name : {{$order->bill_name }}</div>
			<div>Customer : {{$order->User->name}}</div>
			<div style="display:flex;">
				<p>Status :</p>
				<p style="color: red;margin-left:10px; ">
					@if($order->status == 0)
						Cancel
					@elseif($order->status == 1)
						Pending
					@else
						Complete
					@endif
				</p>
			</div>
		</div>
		<div class="card-body">
			<div class="title-contact">
				<table class="table table-hover" style="text-align: center;">
					<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Product Name</th>
						<th scope="col">Quantity</th>
						<th scope="col">Price</th>
					</tr>
					</thead>
					<tbody>

					@foreach($order->OrderProduct as $index => $product)
						<tr>
							<td>{{$index +1}}</td>
							<td>{{$product->product_id}}</td>
							<td>{{$product->count}}</td>
							<td></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
