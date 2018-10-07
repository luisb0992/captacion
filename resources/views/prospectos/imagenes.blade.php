@extends('layouts.app')
@section('title','Prospectos/fotos - '.config('app.name'))
@section('content')
	@include('partials.flash')

	<div class="row">
  		<div class="col-sm-12 fondo_blanco">
  			<h3 class="padding_1em text-capìtalize" style="border-radius: 50px; border: solid 1px #eee;">
  				<span class="label label-info">{{ $prospecto->codigo }}</span> |
  				<i>{{ $prospecto->titulo }}</i>
  			</h3>
  			<form action="{{ route('moreImg', $prospecto->id) }}" method="POST" enctype="multipart/form-data">
  			<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  			@forelse($prospecto->imagenes as $foto)
  				<div class="col-sm-3 box-imagen" id="div_{{ $foto->id }}" style="border: solid 1px #eee; background-color: #fff; height: 200px; padding: 1em; margin-right: 5px;">
					<span>Foto {{ $loop->index+1 }}</span>
					<button class="btn btn-danger btn-sm pull-right" type="button" value="{{ $foto->id }}" onclick="deleteImg(this);" id="btn_img">
						<i class="fa fa-remove" aria-hidden="true"></i>
					</button>
					<br>
					<hr>
					<a href="{{ url("img/$foto->id.$foto->imagen") }}" data-toggle="lightbox" data-max-width="600" id="img">
						<img src="{{ url("img/$foto->id.$foto->imagen") }}" alt="foto" class="img-responsive" style="max-height: 100px">
					</a>
				</div>
			@empty
				<div class="col-sm-3">
					<span>No posee fotos</span>
					<a href="{{ asset('img/sin_imagen.jpg') }}" data-toggle="lightbox" data-max-width="600" id="img" class="btn btn-default btn-sm">
						<img src="{{ url('img/sin_imagen.jpg') }}" alt="foto" class="img-responsive" style="max-height: 100px"> 
					</a>
				</div>
			@endforelse
			<div class="form-group col-sm-12">
				<br>
				<h3 class="text-left label-primary padding_1em">Añadir mas</h3>
				<label for="nombre">Foto<span class="span_rojo">*</span></label>(tamaño max 8MB, solo 3 imagenes)
				<input id="file_input" type="file" data-preview-file-type="img" name="imagen[]" multiple="">
			</div>
			<div class="form-group col-sm-12 text-right">
				<br><br><br>
				<a class="btn btn-default" href="{{route('prospectos.index')}}">
					<i class="fa fa-reply"></i> Atras
				</a>
				<button type="submit" class="btn btn-danger">
					<i class="fa fa-save"></i> Guardar
				</button>
			</div>
			</form>
		</div>
	</div>
@endsection
@section('script')
<script>
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

    function deleteImg(deleteImg){
    	var ruta = '../deleteImg/'+deleteImg.value+'';
    	$.ajax({
    		headers: {'X-CSRF-TOKEN': token},
    		url: ruta,
    		type: 'POST',
    		dataType: 'JSON',
    		data: $('form').serialize(),
    	})
    	.done(function() {
    		console.log("success");
    		$("#div_"+deleteImg.value+"").remove();
    		alert("Eliminado con exito!");
    	})
    	.fail(function() {
    		console.log("error");
    	})
    	.always(function() {
    		console.log("complete");
    	});
    	
    }
</script>
@endsection
