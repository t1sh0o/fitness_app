@extends('app')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">Cards</div>

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
								<th>Mark train</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($cards as $card)
							<tr>
								<td>{{ Auth::user()->name() }}</td>
								<td>{{ $card['fitness_center'] }}</td>
								<td>{{ $card['times_visited'] }}</td>
								<td>{{ $card['max_visits'] }}</td>
								<td>{{ formatDate($card['expire_date'], 'd M Y') }}</td>
								<td>
									@if($card['times_visited'] < $card['max_visits'])
									{!! Form::open([ 'url' => '/cards/' . $card->id, 'method' => 'patch']) !!}
										{!! Form::submit('I`ve trained', ['class' => "btn btn-success btn-sm"]) !!}
									{!! Form::close() !!}
									@else
										Out of Visits
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<hr/>
			@include('create_card')
		</div>
	</div>
</div>
@endsection
