@extends('layouts.app')
@section('title','Prospectos - '.config('app.name'))
@section('header','Prospectos')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li class="active"> Prospectos </li>
	</ol>
@endsection
@section('content')
	@include('partials.flash')

	<a href="{{ url('cargarEntrevistas') }}" class="hidden" id="ruta_ver_entrevistas"></a>
	<a href="{{ url('cargarEntrevistaOne') }}" class="hidden" id="ruta_ver_entrevista_one"></a>
	<a href="{{ url('guardarComentario') }}" id="ruta_crear_comentario" class="hide"></a>
	<!-- Info boxes -->
  <div class="row">
  	<div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>
        
        <div class="info-box-content">
          <span class="info-box-text">Prospectos</span>
          <span class="info-box-number">{{ $pros->count() }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </div><!--row-->

	<div class="row">
  	<div class="col-md-12">
  		<div id="coment_listo" style="display:none">
  			<p id="msj-ajax"></p>
  		</div>
    	<div class="box box-danger">
	      <div class="box-header with-border">
	        <span class="pull-left">
				<a href="{{ route('prospectos.create') }}" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Nueva</a>
			</span>
	      </div>
      	<div class="box-body">
      				<div id="reload_active" style="display: none" class="text-center">
						<i class="fa fa-refresh fa-spin fa-3x fa-fw text-success"></i>
					</div>
					<div class="col-sm-12 bg-danger">
						<h3>Mis Prospectos de inmuebles</h3>
					</div>	
					<table class="table data-table table-bordered table-hover">
						<thead class="label-danger">
							<tr>
								<th class="text-center">Titulo</th>
								<th class="text-center">Tipo propiedad</th>
								<th class="text-center">localidad</th>
								<th class="text-center">Precio</th>
								<th class="text-center">Metros</th>
								<th class="text-center">Opcion</th>
								<th class="text-center">Status</th>
								<th class="text-center">Descargar</th>
								<th class="text-center" style="width: 300px">Accion</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($pros as $t)
								<tr>
									<td>{{$t->titulo}}</td>
									<td>{{$t->tipo->name}}</td>
									<td>{{$t->distrito->distrito}}</td>
									<td>
										<span class="text-capitalize text-left">{{ $t->precio_des }}</span>
										<br>
										<span>{{ $t->precio_sol }} - {{ $t->precio_dol }}</span>
									</td>
									<td>
										<span>{{ $t->metros_con }} - {{ $t->metros_tot }}</span>
									</td>
									<td>{{ $t->opcion }}</td>
									<td class="well">{{ $t->status->name }}</td>
									<td>
										<form action="" method="GET">
											{{ csrf_field() }}
											<button type="submit" class="btn btn-danger btn-sm" id="imprimir" name="id">
												<i class="fa fa-file-pdf-o"></i> PDF
											</button>
										</form>
									</td>
									<td>
										<button type="button" class="btn btn-primary btn-flat btn-sm" data-toggle="modal" data-target="#ver_entrevistas" id="btn_ver_entrevistas" value="{{ $t->id }}" onclick="cargarEntrevistas(this);">
			                    			<i class="fa fa-eye"></i> Ver y editar
			                    		</button>

			                    		@if(\Auth::user()->perfil_id == 1)
										<a href="" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar S/N?');"><i class="fa fa-remove"></i> Eliminar</a>
										@endif 
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script src="{{ asset('js/entrevistas.js') }}"></script>
@endsection