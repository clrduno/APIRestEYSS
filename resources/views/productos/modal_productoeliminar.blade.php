<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="cr-modal-eliminar{{$pro->id}}" data-backdrop="static" 
  data-keyboard="false">
	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-tittle">Eliminar Producto</h4>
					<button class="close" data-dismiss="modal" aria-label="Cerrar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Confirme si desea Eliminar la Producto</p>
					<p>{{ $pro->nombre }}</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="button" onclick="productoElimina(this)"  value="{{$pro->id}}" class="btn btn-primary" data-dismiss="modal">Confirmar</button>
				</div>
			</div>
		</div>
	
</div>