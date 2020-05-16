@extends('layouts.app')

@section('cabecera_imagen')
	@include('layouts.cabecera_imagen')
@endsection

@section('slider')
	@include('layouts.slider')
@endsection

@section('estilos')
	@parent
	<link rel="stylesheet" type="text/css" href="css/fontello.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
@endsection

@section('contenido')	

	<div class="container" style="margin-top: 30px;">
		<div class="row">
			<div class="col">
				<div class="d-flex justify-content-center">
					<div id="div_productos">

					</div>				
				</div>
			</div>
		</div>
	</div>

	@include('productos.modal_productocategorias')
	@include('productos.modal_productoeditar')
	
@endsection	

@section('script')
    @parent

	<!-- Javascript -->
	<script type="text/javascript">	
		var r = new XMLHttpRequest();

		/* conulta las categoría */
		function productos(){
			r.open("GET", "api/productos", true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
			  document.getElementById("div_productos").innerHTML=r.responseText;
			};
			r.send();
		}

		/* consulta las categorias de un producto */
		function productoCategorias(btn){
			document.getElementById("div_producto_categorias").innerHTML='';
			r.open("GET", "api/productos/"+btn.value+"/categorias", true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
			  document.getElementById("div_producto_categorias").innerHTML=r.responseText;
			};
			r.send();
	    };

	    /* elimina la categoria y productos asociados */
		function productoElimina(btn){			
			r.open("DELETE", "api/productos/"+btn.value, true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				productos();
			};
			r.send();
	    };

	    /* consulta el producto */
	    function productoConsulta(btn){
			r.open("GET", "api/productos/"+btn.value, true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;				
				document.getElementById("div_editarproductos").innerHTML=r.responseText;
			};
			r.send();
	    }

	    /* actualiza el producto */
	    function productoActualiza(btn){
	    	var id        		= document.getElementById("productoid_m").value;
	    	var nombre        	= document.getElementById("nombre_m").value;
	    	var descripcion     = document.getElementById("descripcion_m").value;
           
            var dataString      = "?id="+id+"&nombre="+nombre+"&descripcion="+descripcion;
                
			r.open("POST", "api/productosedit"+dataString, true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				productos();
			};
			r.send();
	    }

		/* una vez cargado el documento en el navegador, consulta las categorías */
		window.onload = function(){
			productos();
		}

	</script>

@stop