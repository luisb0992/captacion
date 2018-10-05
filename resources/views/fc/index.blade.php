@extends('layouts.app')
@section('title','Interesados - '.config('app.name'))
@section('header','Interesados')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li class="active"> Interesados </li>
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
          <span class="info-box-text">Interesados</span>
          <span class="info-box-number">{{ $fc->count() }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
  </div><!--row-->

	<div class="row">
	  	<div class="col-md-12">
	    	<div class="box box-danger">
		      <div class="box-header with-border">
		        <span class="pull-left">
					<a href="{{ route('fc.create') }}" class="btn btn-danger"><i class="fa fa-plus" aria-hidden="true"></i> Nueva</a>
				</span>
		      </div>
	      	<div class="box-body">
					<div class="col-sm-12 bg-danger">
						<h3>Mis Interesados x facebook</h3>
					</div>
					<table class="table data-table table-bordered table-hover">
						<thead class="label-danger">
							<tr>
								<th class="text-center">Cliente</th>
								<th class="text-center">Agente</th>
								<th class="text-center">Tipo Inmueble</th>
								<th class="text-center">Distrito</th>
								<th class="text-center">Comentario</th>
								<th class="text-center">Status</th>
								<th class="text-center" style="width: 120px">Accion</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($fc as $t)
								<tr>
									<td>{{ $t->persona->name }}</td>
									<td>{{ $t->user->name }} / {{ $t->opcion }}</td>
									<td>{{ $t->comentario }}</td>
									<td>{{ $t->comentario }}</td>
									<td>{{ $t->comentario }}</td>
									<td class="well">{{ $t->status }}</td>
									<td>
										<!-- <a href="{{ route('fc.edit', $t->id) }}" class="btn btn-primary btn-sm">
                			<i class="fa fa-eye"></i> Ver y editar
                		</a> -->
										<div class="col-sm-6">
											<form action="{{ route('fc_pdf',$t->id ) }}" method="GET" target="_blank">
												{{ csrf_field() }}
												<button type="submit" class="btn btn-default btn-sm">
													<i class="fa fa-file-pdf-o"></i> PDF
												</button>
											</form>
										</div>
										<div class="col-sm-6">
											@if(\Auth::user()->perfil_id == 1)
											<a href="{{ route('fc.eliminar',$t->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Desea eliminar S/N?');">
												<i class="fa fa-trash"></i>
											</a>
											@endif
										</div>
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
