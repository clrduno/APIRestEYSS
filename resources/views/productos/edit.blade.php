@if($producto)
	<div class="row">			
		<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre_m" required value="{{$producto->nombre}}" class="form-control input-sm" >		
			</div>
		</div>	

	</div>
	<div class="row">			
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<input type="text" name="descripcion" id="descripcion_m" required value="{{$producto->descripcion}}" class="form-control input-sm" >		
			</div>
		</div>	
	</div>
	<input type="hidden" name="productoid_m" id="productoid_m" value="{{$producto->id}}" >
@endif