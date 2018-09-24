@extends('master')
@section('title', 'All Catetories')

@section('content')
	<div class="container col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2> All Catetories </h2>
			</div>

			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif

			@if ($categories->isEmpty())
				<p> There is no role.</p>
			@else
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{!! $category->name !!}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			@endif
		</div>
	</div>
@endsection