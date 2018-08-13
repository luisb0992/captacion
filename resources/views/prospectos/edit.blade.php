@extends('layouts.app')
@section('title','Prospecto - '.config('app.name'))
@section('header','Prospecto')
@section('breadcrumb')
	<ol class="breadcrumb">
	  <li><a href="{{route('dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
	  <li><a href="{{route('prospectos.index')}}" title="Entrevistas"> Prospectos</a></li>
	  <li class="active">editar</li>
	</ol>
@endsection
@section('content')
		<!-- Formulario -->
		<div class="fondo_blanco">
			<div class="row padding_1em">
				<form class="" action="{{ route('prospectos.update', $pro->id) }}" method="POST" enctype="multipart/form-data">
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
							<option value="{{ $t->id }}" @if($t->id == $pro->tipo_id) selected @endif>{{ $t->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-4">
						<label for="apellido">Antiguedad <span class="span_rojo">*</span></label>
						<br>
						<label for="">Actualmente {{ $pro->antiguedad }}</label>
						<br>
						<label class="radio-inline"><input type="radio" name="antiguedad" value="En contruccion">En contruccion</label>
						<label class="radio-inline"><input type="radio" name="antiguedad" value="A estrenar">A estrenar</label>
						<br>
						<label class="radio-inline">
							<input type="radio" name="antiguedad" value="ano">
							<input type="text" name="antiguedad_a" class="int"> Años
						</label>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Dormitorios <span class="span_rojo">*</span></label>	
						<select name="dormitorios" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($i = 1; $i <= 12; $i++)
							<option value="{{ $i }}" @if($i == $pro->dormitorios) selected @endif>{{ $i }}</option>
							@endfor
						</select>
						<br><br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Estacionamientos <span class="span_rojo">*</span></label>	
						<select name="estacionamientos" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($e = 1; $e <= 12; $e++)
							<option value="{{ $e }}" @if($e == $pro->estacionamientos) selected @endif>{{ $e }}</option>
							@endfor
						</select>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Baños Completos<span class="span_rojo">*</span></label>	
						<select name="b_completos" class="form-control" required="">
							<option value="">Seleccione...</option>
							@for($b = 1; $b <= 12; $b++)
							<option value="{{ $b }}" @if($b == $pro->b_completos) selected @endif>{{ $b }}</option>
							@endfor
						</select>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Medio baño</label>	
						<select name="b_medio" class="form-control">
							<option value="">Seleccione...</option>
							@for($bm = 1; $bm <= 12; $bm++)
							<option value="{{ $bm }}" @if($bm == $pro->b_medio) selected @endif>{{ $bm }}</option>
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
						<input type="text" name="metros_con" class="form-control int" required="" value="{{ $pro->metros_con }}">
					</div>

					<div class="col-sm-4">
						<label for="nombre">M2 Totales<span class="span_rojo">*</span></label>
						<input type="text" name="metros_tot" class="form-control int" required="" value="{{ $pro->metros_tot }}">
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
						<input type="text" name="direccion" class="form-control" required="" value="{{ $pro->direccion }}">
					</div>

					<div class="col-sm-4">
						<label for="nombre">Codigo postal<span class="span_rojo">*</span></label>
						<input type="text" name="codigo_postal" class="form-control int" required="" value="{{ $pro->codigo_postal }}">
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
							<option value="{{ $depart->id }}" @if($depart->id == $pro->departamento_id) selected @endif>{{ $depart->departamento }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="provincia">Provincia: *</label>
						<select class="form-control" name="provincia_id" id="prov" required>
							@foreach($prov as $p)
							<option value="{{ $p->id }}" @if($p->id == $pro->provincia_id) selected @endif>{{ $p->provincia }}</option>
							@endforeach
						</select>
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="distrito">Distrito: *</label>
						<select class="form-control" name="distrito_id" id="dist" required>
							@foreach($dist as $d)
							<option value="{{ $d->id }}" @if($d->id == $pro->distrito_id) selected @endif>{{ $d->distrito }}</option>
							@endforeach
						</select>
						<br>
					</div>

					<div class="col-sm-12">
						<section class="padding_1em bg-danger">
							<span class="h5">Precio</span>
						</section>
						<br>
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="departamento">Anuncio: *</label>
						<label for="">Actualemnte {{ $pro->precio_des }}</label>
						<select class="form-control" name="precio_des" required>
							<option value="Anunciar para vender">Anunciar para vender</option>
							<option value="Anunciar para alquilar">Anunciar para alquilar</option>
							<option value="Anunciar para temporada">Anunciar para temporada</option>
							<option value="Anunciar para traspaso">Anunciar para traspaso</option>
						</select>
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="departamento">Precio soles: *</label>
						<input type="text" class="form-control int" name="precio_sol" required="" value="{{ $pro->precio_sol }}">
					</div>

					<div class="col-sm-4">
						<label class="control-label" for="departamento">Precio dolar: </label>
						<input type="text" class="form-control int" name="precio_dol" value="{{ $pro->precio_dol }}">
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
						<input type="text" name="titulo" class="form-control" required="" placeholder="ej: Departamento de lujo, unico dueño" value="{{ $pro->titulo }}">
						<br>
					</div>
					
					<div class="col-sm-2">
						<label for="">Foto actual</label>
						<br>
						<button type="button"
						data-toggle="modal" data-target="#foto"
						aria-expanded="false" aria-controls="foto"
						class="btn btn-primary">
							<span class="">
								<i class="fa fa-eye" aria-hidden="true"></i> Ver
							</span>
						</button>
					</div>
					<div class="col-sm-4">
						<label for="nombre">Foto<span class="span_rojo">*</span></label>
						<input id="file_input" type="file" class="file" data-preview-file-type="text" name="imagen">
					</div>

					<div class="col-sm-6">
						<label for="nombre">Descripcion<span class="span_rojo">*</span></label>
						<textarea name="descripcion" class="form-control">{{ $pro->descripcion }}</textarea>
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
						<input  type="text" class="form-control" name="name" value="{{ $pro->persona->name }}">
						<input  type="hidden" class="form-control" name="per_id" value="{{ $pro->persona->id }}">
					</div>

					<div class="col-sm-4">
						<label for="nombre">Email<span class="span_rojo">*</span></label>
						<input  type="email" class="form-control" name="email" value="{{ $pro->persona->email }}">
					</div>

					<div class="col-sm-4">
						<label for="nombre">Telefono<span class="span_rojo">*</span></label>
						<input  type="text" class="form-control int" name="telefono" value="{{ $pro->persona->telefono }}">
						<br>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Opcion<span class="span_rojo">*</span></label>	
						<select name="opcion" class="form-control" required="">
							<option value="">Seleccione...</option>
							<option value="Alquiler" @if($pro->opcion == "Alquiler") selected @endif>Alquiler</option>
							<option value="Venta" @if($pro->opcion == "Venta") selected @endif>Venta</option>
						</select>
					</div>

					<div class="col-sm-4">
						<label for="nombre">Status<span class="span_rojo">*</span></label>	
						<select name="status_id" class="form-control" required="">
							<option value="">Seleccione...</option>
							@foreach($status as $sta)
							<option value="{{ $sta->id }}" @if($sta->id == $pro->status_id) selected @endif>{{ $sta->name }}</option>
							@endforeach
						</select>
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
		@include("prospectos.modal_foto")	
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