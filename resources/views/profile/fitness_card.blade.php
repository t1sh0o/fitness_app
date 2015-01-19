@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>User</th>
									<th>Fitness Center</th>
									<th>Visits</th>
									<th>Max Visits</th>
									<th>Expire Date</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($cards as $card)
								<tr>
									<td>{{ Auth::user()->name() }}</td>
									<td>{{ $card['fitness_center'] }}</td>
									<td>{{ $card['times_visited'] }}</td>
									<td>{{ $card['max_visits'] }}</td>
									<td>{{ $card['expire_date'] }}</td>
								</tr>   
								@endforeach
								</tbody>
							</table>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection
