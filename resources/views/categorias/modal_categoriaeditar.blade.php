
<div class="modal fade" aria-hidden="true" role="dialog" tabindex="-1" id="cr-modal-editar" data-backdrop="static" 
  data-keyboard="false">

	<form id="formdatospersonasedit" action="#" >
		<input type="hidden" name="_token" id="token_datospersonasedit" value="{{ csrf_token() }}">

		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-tittle">Editar Categoría</h4>
					<button class="close" data-dismiss="modal" aria-label="Cerrar">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="div_editarcategorias">
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button id="actualizar" onclick="categoriaActualiza()" class="btn btn-primary" data-dismiss="modal">Actualizar</button>																									
				</div>

			</div>
		</div>
	                       
	</form>   

	
</div>
