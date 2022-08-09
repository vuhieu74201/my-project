@extends('home')
@section('content')
	<div class="card">
		<div class="card-header ">
			<div class="text">
				{{ __('Show Order') }}
			</div>
			<div class="" style="">
				<a href="" class="">
					<button type="button" class="btn btn-primary">
						Add Order
					</button>
				</a>
			</div>
		</div>
		<div class="card-body d-flex">
			<form action="" class="d-flex search-date" role="search">
				<input class="form-control me-2" type="search" placeholder="Search Order name..."
					   aria-label="Search" name="name" value="{{app('request')->input('name')}}">
				<div class=""> from</div>
				<input class="form-control me-2" type="search" aria-label="Search" placeholder="Search Order name..."
					   name="name" value="{{app('request')->input('name')}}">
				<div class="">to</div>
				<input class="form-control me-2" type="search" placeholder="Search Order name..."
					   aria-label="Search" name="name" value="{{app('request')->input('name')}}">
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
						<th scope="col">Order # </th>
						<th scope="col">Bill to Name</th>
						<th scope="col">Subtotal</th>
						<th scope="col">Purchased on </th>
						<th scope="col">Status</th>
						<th scope="col" colspan="2">Actions</th>
					</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>#12321</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>
								<a href="" class="">
									<button type="button" class="btn btn-primary">
										View
									</button>
								</a>
							</td>
							<td class="text">
								<a href="" class="">
									<button type="button" class="btn btn-primary">
										Update
									</button>
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
