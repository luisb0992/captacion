<div class="modal fade" tabindex="-1" role="dialog" id="nuevo_prov">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="{{ route('ubi.store') }}" method="POST">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<div class="">
					<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
					<div class="label-danger text-center padding_1em">
						<h3>Añadir Nueva Provincia</h3>
					</div>
					<div class="modal-body">
            <div class="form-group">
              <label>Departamento</label>
              <select class="form-control" name="departamento_id" required="">
                @foreach($departamentos as $d)
                <option value="{{ $d->id }}">{{ $d->departamento }}</option>
                @endforeach
              </select>
            </div>
						<div class="form-group">
							<label>Nueva Provincia</label>
							<input type="text" name="provincia" class="form-control text-uppercase" required="">
						</div>
					</div>
				</div>
				<div class="padding_1em">
					<div class="text-right">
						<input type="button" class="btn" data-dismiss="modal" value="Cerrar">
						<button type="submit" class="btn btn-danger btn_save_comentario">
							<i class="fa fa-save"></i> Guardar
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
