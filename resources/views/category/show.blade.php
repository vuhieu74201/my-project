@extends('home')
@section('content')
	<div class="card">
		<div class="card-header " style="display: flex ; justify-content: space-between;">
			<div class="text" style="font-size: 25px;">
				Show Category : {{ $category->name }}
			</div>
			<div>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
			<div class="" style="">
				<a href="" class="">
					<button type="button" class="btn text btn-primary">
						Add Category
					</button>
				</a>
			</div>

		</div>
		<div class="card-body">
			<div class="title-contact">
				<table class="table table-bordered " style="text-align: center;">
					<thead>
					<tr>
						<th>STT</th>
						<th> Products Name</th>
						<th> Products Price</th>
						<th>Quantity Products</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>1</td>
						<td>iphone 12</td>
						<td></td>
						<td></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop
