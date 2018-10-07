@extends('layouts.app')
@section('title','Ubicaciones - '.config('app.name'))
@section('header','Ubicaciones')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li class="active"> Ubicaciones </li>
	</ol>
@endsection
@section('content')
	@include('partials.flash')
	<!-- Info boxes -->
  <div class="row">
  	<div class="col-sm-4">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Departamentos</span>
          <span class="info-box-number">{{ $departamentos->count() }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-sm-4">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Provincias</span>
          <span class="info-box-number">{{ $prov->count() }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-sm-4">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Distritos</span>
          <span class="info-box-number">{{ $dist->count() }}</span>
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
              <span class="pull-left">
    						<a href="#nuevo_prov" class="btn btn-danger" data-toggle="modal" data-target="#nuevo_prov">
    							<i class="fa fa-plus" aria-hidden="true"></i> Nuevo
    						</a>
    					</span>
    					@include('ubicaciones.modal_nuevo_prov')
    				</span>
		      </div>
	      	<div class="box-body">
					<table class="table data-table table-bordered table-hover">
						<thead class="label-danger">
							<tr>
								<th class="text-center">Departamentos</th>
								<th class="text-center">Provincias Totales</th>
							</tr>
						</thead>
						<tbody class="text-center">
							@foreach($departamentos as $d)
								<tr>
									<td>{{ $d->departamento }}</td>
									<td>{{ str_replace(array('[', ']', '"'), " ", $d->provincias->pluck('provincia')) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
