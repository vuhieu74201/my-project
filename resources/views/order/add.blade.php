@extends('home')
@section('content')
	<div class="card">
		<div class="card-header ">
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
					<select name ="customer_id" class="form-select" id="country">
						<option value=""> Choose Customer Name ...</option>
						@foreach($customers as $customer)
							<option value="{{$customer->id}}">{{$customer->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="card" style="margin:40px 0; ">
					<div class="card-header">Add Products</div>
					<div class="card-body" id="uploadControls"></div>
					<div class="form-group" style="margin: 20px;">
						<input type="button" class="btn btn-outline-success" onclick="addForm()" value="Add Product"/>
					</div>
				</div>
				<input type="hidden" name="code" id="exampleFormControlInput1" value="{{rand(1000,9999)}}">
				<input type="hidden" name="status" id="exampleFormControlInput1" value="1">
				<div class="form-group" >
					<button type="submit" class="btn btn-outline-success">
						Success
					</button>
				</div>
			</form>
		</div>
	</div>
	<form name="" action="" method="post" enctype="multipart/form-data" style="display:inline;">
		<div class="card" style="margin:40px 0; ">
			<div class="card-header">Add Products </div>
			<div class="card-body">
				<div class="form-group">
					<label for="name" class="form-label">Product Name :</label>
					<select name ="product_id" class="form-select" id="name">
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
			</div>
			<div class="form-group" style="margin: 20px;">
				<input type="button" class="btn btn-outline-success" onclick="addForm()" value="Add Attachment" />
			</div>
		</div>
	</form>
	<script type = "text/javascript">
        var cnt = 0;

        function addForm() {
            var div = document.createElement('DIV');
            div.innerHTML =
				'<input id="name' + cnt + '" name="name' + '' + '" type="text" />' +
                '<input id="Button' + cnt + '" type="button" ' + 'value="X" onclick="deleteForm(this)" />';
            document.getElementById("uploadControls").appendChild(div);
            cnt++;
        }

        function deleteForm(div) {

            document.getElementById("uploadControls").removeChild(div.parentNode);
            cnt--;
        }

	</script>

@stop
