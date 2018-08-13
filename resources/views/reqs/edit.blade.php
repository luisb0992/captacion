@extends('layouts.app')
@section('title','Requerimiento - '.config('app.name'))
@section('header','Requerimiento')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li><a href="{{route('req.index')}}" title="Entrevistas"> Requerimiento</a></li>
	  <li class="active">editar</li>
	</ol>
@endsection
@section('content')
		<!-- Formulario -->
		<div class="fondo_blanco">
			<div class="row padding_1em">
				<form class="" action="{{ route('req.update', $r->id) }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}

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
							<option value="{{ $t->id }}" @if($t->id == $r->tipo_id) selected @endif>{{ $t->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-4">
						<label for="apellido">Antiguedad <span class="span_rojo">*</span></label>
						<br>
						<label for="">Actualmente {{ $r->antiguedad }}</label>
						<br>
						<label class="radio-inline"><input type="radio" name="antiguedad" value="En contruccion">En contruccion</label>
						<label class="radio-inline"><input type="radio" name="antiguedad" value="A estrenar">A estrenar</label>
						<br>
						<label class="radio-inline">
							<input type="radio" name="antiguedad" value="ano">
							<input type="text" name="antiguedad_a" class="int" value="{{ $r->antiguedad }}"> Años
						</label>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Dormitorios <span class="span_rojo">*</span></label>	
						<select name="dormitorios" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($i = 1; $i <= 12; $i++)
							<option value="{{ $i }}" @if($i == $r->dormitorios) selected @endif>{{ $i }}</option>
							@endfor
						</select>
						<br><br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Estacionamientos <span class="span_rojo">*</span></label>	
						<select name="estacionamientos" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($e = 1; $e <= 12; $e++)
							<option value="{{ $e }}" @if($e == $r->estacionamientos) selected @endif>{{ $e }}</option>
							@endfor
						</select>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Baños Completos<span class="span_rojo">*</span></label>	
						<select name="b_completos" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($b = 1; $b <= 12; $b++)
							<option value="{{ $b }}" @if($b == $r->b_completos) selected @endif>{{ $b }}</option>
							@endfor
						</select>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Medio baño</label>	
						<select name="b_medio" class="form-control">
							<option value="">Seleccione...</option>
							@for($bm = 1; $bm <= 12; $bm++)
							<option value="{{ $bm }}" @if($bm == $r->b_medio) selected @endif>{{ $bm }}</option>
							@endfor
						</select>
						<br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">M2 Totales<span class="span_rojo">*</span></label>
						<input type="text" name="metros_cua" class="form-control int" required="" value="{{ $r->metros_cua }}">
						<br>
					</div>

					<div class="col-sm-4 well well-sm">
						<label class="control-label" for="departamento">Presupuesto: *</label>
						<input type="text" class="form-control int" name="presupuesto" required="" value="{{ $r->presupuesto }}">
					</div>

					<div class="col-sm-4 text-left">
						<label class="control-label" for="">unidad: *</label>
						<select class="form-control" name="unidad_id" required>
							@foreach($unidades as $u)
							<option value="{{ $u->id }}" @if($u->id == $r->unidad_id) selected @endif>{{ $u->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-sm-12">
						<label class="control-label" for="departamento">Referencia: *</label>
						<input type="text" class="form-control" name="referencia" required="" value="{{ $r->referencia }}">
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
							<option value="{{ $depart->id }}" @if($depart->id == $r->departamento_id) selected @endif>{{ $depart->departamento }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="provincia">Provincia: *</label>
						<select class="form-control" name="provincia_id" id="prov" required>
							@foreach($prov as $p)
							<option value="{{ $p->id }}" @if($p->id == $r->provincia_id) selected @endif>{{ $p->provincia }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="distrito">Distrito: *</label>
						<select class="form-control" name="distrito_id" id="dist" required>
							@foreach($dist as $d)
							<option value="{{ $d->id }}" @if($d->id == $r->distrito_id) selected @endif>{{ $d->distrito }}</option>
							@endforeach
						</select>
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
						<label for="nombre">Nombre completo<span class="span_rojo">*</span></label>
						<input  type="text" class="form-control" name="name" value="{{ $r->persona->name }}">
						<input  type="hidden" class="form-control" name="per_id" value="{{ $r->persona->id }}">
					</div>

					<div class="col-sm-4">
						<label for="nombre">Email<span class="span_rojo">*</span></label>
						<input  type="email" class="form-control" name="email" value="{{ $r->persona->email }}">
					</div>

					<div class="col-sm-4">
						<label for="nombre">Telefono<span class="span_rojo">*</span></label>
						<input  type="text" class="form-control int" name="telefono" value="{{ $r->persona->telefono }}">
						<br>
					</div>
	
					<div class="col-sm-4">
						<label for="nombre">Opcion<span class="span_rojo">*</span></label>	
						<select name="opcion" class="form-control" required="">
							<option value="">Seleccione...</option>
							<option value="Alquiler" @if($r->opcion == "Alquiler") selected @endif>Alquiler</option>
							<option value="Venta" @if($r->opcion == "Venta") selected @endif>Venta</option>
						</select>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Status<span class="span_rojo">*</span></label>	
						<select name="status" class="form-control" required="">
							<option value="caliente" @if($r->status == "caliente") selected @endif>Caliente</option>
							<option value="tibio" @if($r->status == "tibio") selected @endif>Tibio</option>
							<option value="congelado" @if($r->status == "congelado") selected @endif>Congelado</option>
							<option value="frio" @if($r->status == "frio") selected @endif>Frio</option>
						</select>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Comentario</label>	
						<textarea name="comentario" class="form-control" cols="30" rows="5">{{ $r->comentario }}</textarea>
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
						<a class="btn btn-default" href="{{route('req.index')}}">
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
		$.get("../../prov/"+event.target.value+"",function(response, dep){
			$("#prov").empty();
			$("#dist").empty();
			for (i = 0; i<response.length; i++) {
					$("#prov").append("<option value='"+response[i].id+"'> "+response[i].provincia+"</option>");
			}
		});
	});

	// busqueda de provincias
	$('#prov').change(function(event) {
		$.get("../../dist/"+event.target.value+"",function(response, dep){
			$("#dist").empty();
			for (i = 0; i<response.length; i++) {
					$("#dist").append("<option value='"+response[i].id+"'> "+response[i].distrito+"</option>");
			}
		});
	});

</script>
@endsection