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
								<th class="text-center">Codigo</th>
								<th class="text-center">Titulo</th>
								<th class="text-center">Precio</th>
								<th class="text-center">Opcion</th>
								<th class="text-center">Status</th>
								<th class="text-center">Descargar</th>
								<th class="text-center" width="150px">Accion</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($pros as $t)
								<tr>
									<td class="well">{{$t->codigo}}</td>
									<td>{{$t->titulo}}</td>
									<!-- <td>{{$t->tipo->name}}</td> -->
									<td>
										<span class="text-capitalize text-left">{{ $t->precio_des }}</span>
										<br>
										<span class="text-danger">{{ $t->precio_sol.' sol' }}</span> <span class="text-primary">@if($t->precio_dol) - {{ $t->precio_dol.' $' }} @endif</span>
									</td>
									<td>{{ $t->opcion }}</td>
									<td class="well">{{ $t->status->name }}</td>
									<td>
										<form action="{{ route('p_pdf',$t->id ) }}" method="GET" target="_blank">
											{{ csrf_field() }}
											<button type="submit" class="btn btn-danger btn-sm">
												<i class="fa fa-file-pdf-o"></i> PDF
											</button>
										</form>
									</td>
									<td>	
										<div class="btn-group">
											  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											    <i class="fa fa-image"></i> <span class="caret"></span>
											  </button>
											  <ul class="dropdown-menu">
												@forelse($t->imagenes as $foto)
													<li>
														<a href="{{ url("img/$foto->id.$foto->imagen") }}" data-toggle="lightbox" data-max-width="600" id="img">
															<i class="fa fa-image"></i> {{ $loop->index+1 }}
														</a>
													</li>
												@empty
													<li>
														<a href="{{ asset('img/sin_imagen.jpg') }}" data-toggle="lightbox" data-max-width="600" id="img" class="btn btn-default btn-sm">
															<i class="fa fa-image"></i> 
														</a>
													</li>
												@endforelse
											  </ul>
										</div>
										<a href="{{ route('prospectos.edit', $t->id) }}" class="btn btn-primary btn-sm">
				                			<i class="fa fa-eye"></i> | <i class="fa fa-edit"></i> 
				                		</a>
				                		@if(\Auth::user()->perfil_id == 1)
										<a href="{{ route('pros.eliminar',$t->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar S/N?');">
											<i class="fa fa-remove"></i> 
										</a>
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
<script>
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
</script>
@endsection
