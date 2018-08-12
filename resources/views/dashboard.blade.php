@extends('layouts.app')
@section('title','Inicio - '.config('app.name'))

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="padding_1em bg-danger">
				<h4>Bienvenido(a) {{ \Auth::user()->name }}</h4>
			</div>
			<br>
		</div>
			<div class="col-sm-4 border_right_1">
				<a href="{{ url('entrevistas') }}">   
					<img src="{{ asset('img/dashboard_2.png') }}" alt="entrevistas" class="img_hover img-responsive text-center col-sm-10">
				</a>
				<span class="h3 text-center"><i>Prospectos</i></span>
			</div>
		</div>
@endsection