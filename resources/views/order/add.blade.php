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
				<div class="form-group row">
					<div class="col-lg-4">
						<label for="exampleFormControlInput1">
							Bill to Name :
						</label>
						<input type="text" name="name" class="form-control" id="exampleFormControlInput1">
					</div>

				</div>
				<div class="form-group row">
					<div class="col-lg-4">
						<label for="country" class="form-label">Customer Name :</label>
						<select name="user_id" class="form-select" id="country">
							<option value=""> Choose Customer Name ...</option>
							@foreach($customers as $customer)
								<option value="{{$customer->id}}">{{$customer->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="card" style="margin:40px 0; ">
					<div class="card-header">Add Products</div>
					<div class="card-body" id="uploadControls">
						<div id="product_1">
							<div class="form-group row">
								<div class="col-lg-4">
									<label for="name" class="form-label">Product Name :</label>
									<select name="product_id_1" class="form-select" id="name">
										<option value=""> Choose Product Name ...</option>
										@foreach($products as $product)
											<option value="{{$product->id}}">{{$product->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-4">
									<label for="exampleFormControlInput1">
										Quantity product :
									</label>
									<input type="number" name="quantity_1" class="form-control"
										   id="exampleFormControlInput1" value>
								</div>
							</div>
							<div style="margin: 10px 0;">
								<input type="button" onclick="deleteForm(1)" class="btn btn-outline-danger"
									   value="Remove Product"/>
							</div>
						</div>


						<hr>
					</div>
					<div class="form-group" style="margin: 20px;">
						<input type="button" class="btn btn-outline-success" onclick="addForm()" value="Add Product"/>
					</div>
				</div>
				<input type="hidden" name="code" id="exampleFormControlInput1" value="{{rand(1000,9999)}}">
				<input type="hidden" name="status" id="exampleFormControlInput1" value="1">
				<input type="hidden" name="numOfProduct" id="numOfProduct" value="[1]">
				<div class="form-group">
					<button type="submit" class="btn btn-outline-success">
						Success
					</button>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
        let numOfProduct = 1;
        let productArray = [1];

        function updateNumOfProduct() {
            document.getElementById('numOfProduct').value = JSON.stringify(productArray);
        }

        function addForm() {
            numOfProduct++;
            productArray.push(numOfProduct);
            updateNumOfProduct();


            let parentDiv = document.getElementById('uploadControls');
            let newForm = document.createElement('div');
            newForm.id = "product_" + numOfProduct;
            newForm.innerHTML = `
            <div class="form-group row">
                <div class="col-lg-4">
                    <label for="name" class="form-label">Product Name :</label>
                    <select name ="product_id_${numOfProduct}" class="form-select" id="name">
                        <option value=""> Choose Product Name ...</option>
						@foreach($products as $product)
			                  <option value="{{$product->id}}">{{$product->name}}</option>
						@endforeach
                     </select>
		        </div>
	        </div>
	        <div class="form-group row">
		            <div class="col-lg-4">
		            	<label for="exampleFormControlInput1">Quantity product :</label>
		             	<input type="number" name="quantity_${numOfProduct}"
		             	       class="form-control" id="exampleFormControlInput1">
                    </div>
            </div>
            <div style="margin:10px 0">
                  <input type="button" onclick = "deleteForm(${numOfProduct})"
                         class="btn btn-outline-danger" value="Remove Product"/>
            </div>
            <hr>`
            parentDiv.append(newForm);
        }

        function deleteForm(id) {
            productArray = removeItem(productArray, id);
            updateNumOfProduct();
            let currentForm = document.getElementById('product_' + id);
            currentForm.remove();
        }

        function removeItem(arr, value) {
            var index = arr.indexOf(value);
            if (index > -1) {
                arr.splice(index, 1);
            }
            return arr;
        }
	</script>

@stop
