@extends('app')

@section('style')
	<link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

	<style>
		body {
			color: #B0BEC5;
		}

		.container {
			font-weight: 100;
			font-family: 'Lato';
			text-align: center;
			vertical-align: middle;
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 96px;
			margin-bottom: 40px;
		}

		.quote {
			font-size: 24px;
		}
	</style>
@stop


@section('content')
	<div class="container">
		<div class="content">
			<div class="title">Fitness App</div>
			<div class="quote">{{ Inspiring::quote() }}</div>
		</div>
	</div>	

@stop