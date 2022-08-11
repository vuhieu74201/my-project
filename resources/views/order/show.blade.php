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
			<form action="{{route('order.update',['order'=>$order->id])}}" method="POST">
				@method('PATCH')
				@csrf
				<div>Order code : #{{$order->order_code}}</div>
				<div>Bill name : {{$order->bill_name }}</div>
				<div>Customer : {{$order->User->name}}</div>
				<div style="display:flex;margin: 20px 0;">
					<label for="status" class="">Status :</label>
					<select name="status" id="status" style="color: red;margin-left:10px;width: 10%;height:30px;" >
						@if($order->status == 0)
							<option value="0">Cancel</option>
						@elseif($order->status == 1)
							<option value="1">Pending</option>
						@else
							<option value="2">Complete</option>
						@endif
						<option value="0">Cancel</option>
						<option value="1">Pending</option>
						<option value="2">Complete</option>
					</select>
				</div>
				<div class="form-group" style="margin-top: 20px;">
					<button type="submit" class="btn btn-outline-success">
						Update
					</button>
				</div>
			</form>
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
					@foreach($order->orderProducts as $index => $orderProduct)
						<tr>
							<td>{{$index +1}}</td>
							<td>{{$orderProduct->product->name}}</td>
							<td>{{$orderProduct->count}}</td>
							<td>{{number_format($orderProduct->Product->price,0,',','.')}}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
