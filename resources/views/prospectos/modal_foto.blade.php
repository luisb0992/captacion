<div class="modal fade" tabindex="-1" role="dialog" id="foto">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body">
				@if($pro->foto)
				<label for="">Foto Actual</label>
				<img src="{{ url("img/$pro->id.$pro->foto") }}"
				class="img-responsive col-sm-12" style="padding: 1em;">
				@else
				<label for="">Sin Foto</label>
				<img src="{{ asset('img/sin_imagen.jpg') }}" alt="imagen" class="img-rounded img-responsive col-sm-10">
				@endif
			</div>
			<div class="modal-footer">
				<div class="form-group text-right">
					<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
				</div>
			</div>
		</div>
	</div>
</div>
