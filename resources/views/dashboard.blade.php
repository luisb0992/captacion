@extends('layouts.app')
@section('title','Inicio - '.config('app.name'))

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="padding_1em bg-danger text-capitalize">
				<h2>Bienvenido(a) <span class="label label-danger">{{ \Auth::user()->name }}</span></h2>
			</div>
			<br>
		</div>
		@if(\Auth::user()->perfil_id == 1)
			<div class="col-sm-12">
				<div class="box box-danger">
			      	<div class="box-header with-border">
			        	<h3 class="box-title"><i class="fa fa-users"></i> Usuarios Online</h3>
			      	</div>
					<div class="box-body">
						<table class="table data-table table-bordered table-hover">
							<thead class="label-danger">
								<tr>
									<th class="text-center">Nombre y Apellido</th>
									<th class="text-center">Direccion</th>
									<th class="text-center">Perfil</th>
									<th class="text-center">Online</th>
								</tr>
							</thead>
							<tbody class="text-center">
								@foreach($users as $d)
									<tr>
										<td>{{$d->name}} {{$d->apellido}}</td>
										<td>{{ $d->dep->departamento }} / {{ $d->prov->provincia }} / {{ $d->dist->distrito }}</td>
										<td class="@if($d->perfil_id == 1) label-primary @else label-info @endif">{{ $d->perfil->name }}</td>
										<td>
											@if($d->online == 1)
											<span class="text-success"><i class="fa fa-check-circle text-success"></i>Conectado</span>
											@else
											<span class="text-danger">Desconectado</span>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			@else
			<div class="col-sm-4">
				<img src="{{ asset('img/casa5.png') }}" alt="entrevistas" class="img_hover img-responsive text-center">
				<span class="h3 text-center"><i>Vende</i></span>
			</div>
			<div class="col-sm-4">
				<img src="{{ asset('img/casa6.png') }}" alt="entrevistas" class="img_hover img-responsive text-center">
				<span class="h3 text-center"><i>Adquiere</i></span>
			</div>
			<div class="col-sm-4">
				<img src="{{ asset('img/casa7.png') }}" alt="entrevistas" class="img_hover img-responsive text-center">
				<span class="h3 text-center"><i>Disfruta</i></span>
			</div>
			@endif
		</div>
@endsection
