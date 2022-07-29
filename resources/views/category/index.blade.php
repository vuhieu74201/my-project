@extends('home')
@section('content')
	<div class="card">
		<div class="card-header " style ="display: flex ; justify-content: space-between" >
			<div class="text" style="font-size: 25px">
				{{ __('Show Category') }}
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
						<th>
							STT
						</th>
						<th>Name</th>
						<th>Quantity Products</th>
						<th colspan="2">
							Action
						</th>
					</tr>
					</thead>
					<tbody>

					<tr>
						<td>1</td>
						<td>Apple</td>
						<td>
							30
						</td>
						<td>
							<a href="" class="text">
								<button type="button" class="btn btn-primary">
									Show
								</button>
							</a>
						</td>
						<td class="text">
							<form action="" method="POST">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-primary">Delete</button>
							</form>
						</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@stop