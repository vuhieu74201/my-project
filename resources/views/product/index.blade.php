@extends('home')
@section('content')
	<div class="card">
		<div class="card-header">{{ __('Show Products') }}</div>
		<div class="card-body">
			<div class="title-contact">
				<table class="table table-bordered " style="text-align: center;">
					<thead>
					<tr>
						<th>
							STT
						</th>
						<th>Name</th>
						<th>Quantity</th>
						<th colspan="2">
							action
						</th>
					</tr>
					</thead>
					<tbody>

					<tr>
						<td>1</td>
						<td>Apple</td>
						<td>
							<div class="note">

							</div>
						</td>
						<td>
							<a href="" class="">
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



