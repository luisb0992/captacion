@extends('layouts.app')
@section('title','Interesados - '.config('app.name'))
@section('header','Interesados')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li><a href="{{route('fc.index')}}" title="Entrevistas"> Interesados</a></li>
	  <li class="active">Agregar</li>
	</ol>
@endsection
@section('content')
		<!-- Formulario -->
		<div class="fondo_blanco">
			<div class="row padding_1em">
				<form class="" action="{{ route('fc.store') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

					<!-- datos personales -->
					<div class="col-sm-12">
						<section class="padding_1em label-danger">
							<span class="h4">Datos personales</span>
							<br>
							<span>(<span class="span_rojo">*</span>)<sub> campos obligatorios</sub></span>
						</section>
						<br>
					</div>

					<!-- datos contacto -->
					<div class="col-sm-12">
						<section class="padding_1em label-danger">
							<span class="h4">Datos de contacto</span>
						</section>
						<br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Cliente<span class="span_rojo">*</span></label>
						<input  type="text" class="form-control" name="name" required>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Email</label>
						<input  type="email" class="form-control" name="email">
					</div>

					<div class="col-sm-4">
						<label for="nombre">Telefono<span class="span_rojo">*</span></label>
						<input  type="text" class="form-control int" name="telefono">
						<br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Opcion<span class="span_rojo">*</span></label>
						<select name="opcion" class="form-control" required="">
							<option value="">Seleccione...</option>
							<option value="Alquiler">Alquiler</option>
							<option value="Venta">Venta</option>
						</select>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Status<span class="span_rojo">*</span></label>
						<select name="status" class="form-control" required="">
							<option value="caliente">Caliente</option>
							<option value="tibio">Tibio</option>
							<option value="congelado">Congelado</option>
							<option value="frio">Frio</option>
						</select>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Tipo de inmueble<span class="span_rojo">*</span></label>
						<select name="tipo_id" class="form-control" required="">
							@foreach($tipos as $t)
							<option value="{{ $t->id }}">{{ $t->name }}</option>
							@endforeach
						</select>
						<br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Distrito<span class="span_rojo">*</span></label>
						<input  type="text" class="form-control" name="distrito" required>
					</div>

					<div class="col-sm-8">
						<label for="nombre">Comentario</label>
						<textarea name="comentario" class="form-control" cols="30" rows="5"></textarea>
					</div>

					@if (count($errors) > 0)
					<div class="col-sm-12">
	          <div class="alert alert-danger alert-important">
		          <ul>
		            @foreach($errors->all() as $error)
		              <li>{{$error}}</li>
		            @endforeach
		          </ul>
	          </div>
	        </div>
	        @endif

					<div class="col-sm-12 text-right">
					<hr>
						<a class="btn btn-default" href="{{route('fc.index')}}">
							<i class="fa fa-reply"></i> Atras
						</a>
						<button class="btn btn-danger" type="submit">
							<i class="fa fa-send"></i> Guardar
						</button>
					</div>
				</form>
			</div>
		</div>
@endsection
