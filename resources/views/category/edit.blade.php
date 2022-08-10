@extends('home')
@section('content')
	<div class="card">
		<div class="card-header " style ="display: flex ; justify-content: space-between" >
			<div class="text" style="font-size: 25px">
				{{ __('Update Category') }}
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
			<form action="{{route('category.update',['category'=>$category->id])}}" method="POST">
				@method('PATCH')
				@csrf
				<div class="form-group">
					<label for="exampleFormControlInput1">
						Name Category :
					</label>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1"
						   value="{{$category->name}}">
				</div>
				<div class="form-group" style="margin-top: 20px">
					<button type="submit" class="btn btn-outline-success">
						Update
					</button>
				</div>
			</form>
		</div>
	</div>

@stop
