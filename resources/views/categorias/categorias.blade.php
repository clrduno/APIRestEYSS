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
					<div id="div_categorias">

					</div>				
				</div>
			</div>
		</div>
	</div>
	
	@include('categorias.modal_categoriaproductos')
	@include('categorias.modal_categoriaeditar')

@endsection	

@section('script')
    @parent

	<!-- Javascript -->
	<script type="text/javascript">	
		var r = new XMLHttpRequest();

		/* conulta las categoría */
		function categorias(){
			r.open("GET", "api/categorias", true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
			  document.getElementById("div_categorias").innerHTML=r.responseText;
			};
			r.send();
		}

		/* consulta los productos de una categoria */
		function categoriaProductos(btn){
			document.getElementById("div_categoria_productos").innerHTML='';
			r.open("GET", "api/categorias/"+btn.value+"/productos", true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
			  document.getElementById("div_categoria_productos").innerHTML=r.responseText;
			};
			r.send();
	    };

	    /* elimina la categoria y productos asociados */
		function categoriaElimina(btn){			
			r.open("DELETE", "api/categorias/"+btn.value, true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				categorias();
			};
			r.send();
	    };

	    /* consulta la categoría */
	    function categoriaConsulta(btn){
			r.open("GET", "api/categorias/"+btn.value, true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;				
				document.getElementById("div_editarcategorias").innerHTML=r.responseText;
			};
			r.send();
	    }

	    /* actualiza la categoría */
	    function categoriaActualiza(btn){
	    	var id        		= document.getElementById("categoriaid_m").value;
	    	var nombre        	= document.getElementById("nombre_m").value;
	    	var descripcion     = document.getElementById("descripcion_m").value;
           
            var dataString      = "?id="+id+"&nombre="+nombre+"&descripcion="+descripcion;
                
			r.open("POST", "api/categoriasedit"+dataString, true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				categorias();
			};
			r.send();
	    }

		/* una vez cargado el documento en el navegador, consulta las categorías */
		window.onload = function(){
			categorias();
		}

	</script>

@stop