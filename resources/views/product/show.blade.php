	@extends('home')
@section('content')
	<div class="card">
		<div class="card-header ">
			<div class="text">
				{{ __('Add Product') }}
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
			<form action="" method="POST">
				@method('PATCH')
				@csrf
				<div class="form-group">
					<label for="exampleFormControlInput1">
						Name product :
					</label>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$product->name}}">
				</div>
				<div class="form-group">
					<label for="country" class="form-label">Category Name :</label>
					<select name="category_id" class="form-select" id="country" required>
						@foreach($categories as $category)
							{{$selected = $product->category->id == $category->id ? "selected": ""}}
							<option value="{{$category->id}}" {{$selected}}>{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">
						Price product :
					</label>
					<input type="text" name="price" class="form-control" id="exampleFormControlInput1" value="{{$product->price}}" >
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">
						Quantity product :
					</label>
					<input type="text" name="quantity" class="form-control" id="exampleFormControlInput1" value="{{$product->quantity}}">
				</div>
				<div class="form-group">
					<label for="exampleFormControlInput1">
						Describe :
					</label>
					<textarea name="description" class="form-control" id="exampleFormControlInput1" rows="3">{{$product->description}}</textarea>
				</div>
				<div class="form-group" style="margin-top: 20px;">
					<button type="submit" class="btn btn-primary">
						Update
					</button>
				</div>
			</form>
		</div>
	</div>

@stop
