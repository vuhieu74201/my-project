@extends('home')
@section('content')
	<div class="card">
		<div class="card-header " style="display: flex ; justify-content: space-between">
			<div class="text" style="font-size: 25px">
				{{ __('Add Category') }}
			</div>
		</div>
		<div class="card-body">
			<form action="{{route('category.store')}}" method="POST">
				@csrf
				<div class="form-group">
					<label for="exampleFormControlInput1">
						Name Category :
					</label>
					<input type="text" name="name" class="form-control" id="exampleFormControlInput1">
				</div>
				<div class="form-group" style="margin-top: 20px">
					<button type="submit" class="btn btn-primary">
						Add Category
					</button>
				</div>
			</form>
		</div>
	</div>

@stop
