@extends('layouts.app')
@section('main')
	<div class="row justify-content-center" style="margin: 0 auto">
		<div class="col-md-2">
			@include('sidebar.index')
		</div>
		<div class="col-md-10">
			@yield('content')
		</div>
	</div>
@stop
