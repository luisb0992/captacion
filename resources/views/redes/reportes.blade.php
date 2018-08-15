@extends('layouts.app')
@section('title','Reportes - '.config('app.name'))
@section('header','Reportes')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li class="active"> Reportes </li>
	</ol>
@endsection
@section('content')
	@include('partials.flash')

	<div class="row">
	  	<div class="col-md-12">
	    	<div class="box box-danger">
		      	<div class="box-header with-border">
		      	</div>
	      		<div class="box-body">
					<table class="table data-table table-bordered table-hover">
						<thead>
							<tr>
								<th class="text-center">Usuario</th>
								<th class="text-center">Link de Facebook</th>
								<th class="text-center">Fecha</th>
								<th class="text-center">Hora</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($reportes as $r)
								<tr>
									<td>{{ $r->red->user->name }} {{ $r->red->user->apellido }}</td>
									<td>{{ $r->red->link }}</td>
									<td>{{ $r->fecha }}</td>
									<td>{{ $r->hora }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
