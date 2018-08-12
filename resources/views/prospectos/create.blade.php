@extends('layouts.app')
@section('title','Prospecto - '.config('app.name'))
@section('header','Prospecto')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li><a href="{{route('prospectos.index')}}" title="Entrevistas"> Prospectos</a></li>
	  <li class="active">Agregar</li>
	</ol>
@endsection
@section('content')
		<!-- Formulario -->
		<div class="fondo_blanco">
			<div class="row padding_1em">
				<form class="" action="{{ route('prospectos.store') }}" method="POST">
					{{ csrf_field() }}
					
					<!-- datos personales -->
					<div class="col-sm-12">
						<section class="padding_1em label-danger">
							<span class="h4">Datos Inmueble</span>
							<br>
							<span>(<span class="span_rojo">*</span>)<sub> campos obligatorios</sub></span>
						</section>
						<br>
					</div>
					
					<div class="col-sm-4">
						<label for="nombre">Tipo de inmueble <span class="span_rojo">*</span></label>	
						<select name="tipo_id" class="form-control" required="">
							<option value="">Seleccione...</option>
							@foreach($tipos as $t)
							<option value="{{ $t->id }}">{{ $t->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-4">
						<label for="apellido">Antiguedad <span class="span_rojo">*</span></label>
						<br>
						<label class="radio-inline"><input type="radio" name="antiguedad" value="En contruccion">En contruccion</label>
						<label class="radio-inline"><input type="radio" name="antiguedad" value="A estrenar">A estrenar</label>
						<br>
						<label class="radio-inline">
							<input type="radio" name="antiguedad" value="ano">
							<input type="text" name="antiguedad_a" class=""> Años
						</label>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Dormitorios <span class="span_rojo">*</span></label>	
						<select name="dormitorios" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($i = 1; $i <= 12; $i++)
							<option value="{{ $i }}">{{ $i }}</option>
							@endfor
						</select>
						<br><br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Estacionamientos <span class="span_rojo">*</span></label>	
						<select name="estacionamientos" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($e = 1; $e <= 12; $e++)
							<option value="{{ $e }}">{{ $e }}</option>
							@endfor
						</select>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Baños Completos<span class="span_rojo">*</span></label>	
						<select name="b_completos" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($b = 1; $b <= 12; $b++)
							<option value="{{ $b }}">{{ $b }}</option>
							@endfor
						</select>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Medio baño<span class="span_rojo">*</span></label>	
						<select name="b_medio" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($bm = 1; $bm <= 12; $bm++)
							<option value="{{ $bm }}">{{ $bm }}</option>
							@endfor
						</select>
						<br>
					</div>

					<div class="col-sm-12">
						<section class="padding_1em bg-danger">
							<span class="h5">Dimensiones</span>
						</section>
						<br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">M2 Construidos<span class="span_rojo">*</span></label>
						<input type="text" name="metros_con" class="form-control" required="">
					</div>

					<div class="col-sm-4">
						<label for="nombre">M2 Totales<span class="span_rojo">*</span></label>
						<input type="text" name="metros_tot" class="form-control" required="">
						<br>
					</div>
					
					<div class="col-sm-12">
						<section class="padding_1em bg-danger">
							<span class="h5">Localizacion</span>
						</section>
						<br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Direccion<span class="span_rojo">*</span></label>
						<input type="text" name="direccion" class="form-control" required="">
					</div>

					<div class="col-sm-4">
						<label for="nombre">Codigo postal<span class="span_rojo">*</span></label>
						<input type="text" name="codigo_postal" class="form-control" required="">
						<br>
					</div>

					<div class="col-sm-12">
						<section class="padding_1em bg-danger">
							<span class="h5">Ubicacion</span>
						</section>
						<br>
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="departamento">Departamento: *</label>
						<select class="form-control" name="departamento_id" id="dep" required>
							<option value="">Seleccione</option>
							@foreach($departamentos as $depart)
							<option value="{{ $depart->id }}">{{ $depart->departamento }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="provincia">Provincia: *</label>
						<select class="form-control" name="provincia_id" id="prov" required>
						</select>
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="distrito">Distrito: *</label>
						<select class="form-control" name="distrito_id" id="dist" required>
						</select>
						<br>
					</div>

					<!-- datos personales -->
					<div class="col-sm-12">
						<section class="padding_1em label-danger">
							<span class="h4">Datos Publicidad</span>
						</section>
						<br>
					</div>

					<div class="col-sm-12">
						<label for="nombre">Titulo<span class="span_rojo">*</span></label>
						<input type="text" name="titulo" class="form-control" required="">
					</div>

					<div class="col-sm-6">
						<label for="nombre">Foto<span class="span_rojo">*</span></label>
						<input id="file_input" type="file" class="file" data-preview-file-type="text" name="foto">
					</div>

					<div class="col-sm-6">
						<label for="nombre">Descripcion<span class="span_rojo">*</span></label>
						<textarea name="descripcion" class="form-control"></textarea>
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
						<a class="btn btn-default" href="{{route('prospectos.index')}}">
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
@section("script")
<script>

	// busqueda de provincias
	$('#dep').change(function(event) {
		$.get("../prov/"+event.target.value+"",function(response, dep){
			$("#prov").empty();
			$("#dist").empty();
			for (i = 0; i<response.length; i++) {
					$("#prov").append("<option value='"+response[i].id+"'> "+response[i].provincia+"</option>");
			}
		});
	});

	// busqueda de provincias
	$('#prov').change(function(event) {
		$.get("../dist/"+event.target.value+"",function(response, dep){
			$("#dist").empty();
			for (i = 0; i<response.length; i++) {
					$("#dist").append("<option value='"+response[i].id+"'> "+response[i].distrito+"</option>");
			}
		});
	});

</script>
@endsection