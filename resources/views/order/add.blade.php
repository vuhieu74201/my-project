@extends('home')
@section('content')
	<div class="card">
		<div class="card-header " style="display: flex ; justify-content: space-between">
			<div class="text" style="font-size: 25px">
				{{ __('Add Order') }}
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
			<form action="{{route('order.store')}}" method="POST">
				@csrf
				<div class="form-group">
					<label for="exampleFormControlInput1">
						Bill to Name :
					</label>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1">
				</div>
				<div class="form-group">
					<label for="country" class="form-label">Customer Name :</label>
					<select name ="customer_id" class="form-select" id="country" required>
						<option value=""> Choose Customer Name ...</option>
						@foreach($customers as $customer)
							<option value="{{$customer->id}}">{{$customer->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="country" class="form-label">Product Name :</label>
					<select name ="product_id" class="form-select" id="country" required>
						<option value=""> Choose Product Name ...</option>
						@foreach($products as $product)
							<option value="{{$product->id}}">{{$product->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">
						Quantity product :
					</label>
					<input type="number" name="quantity" class="form-control" id="exampleFormControlInput1">
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">
						Describe :
					</label>
					<textarea name="description" class="form-control" id="exampleFormControlInput1" rows="3"></textarea>
				</div>
				<input type="hidden" name="code" id="exampleFormControlInput1" value="{{rand(1000,9999)}}">
				<div class="form-group" style="margin-top: 20px">
					<button type="submit" class="btn btn-primary">
						Success
					</button>
				</div>
			</form>
		</div>
	</div>

@stop
