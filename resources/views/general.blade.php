<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<title>EYSS</title>
</head>
<body>
	<!-- de esta manera podemos centrar el texto -->
	<div class="jumbotron mt-0">
		<div class="container">
			<h1 class="display-6 mb-2">Evaluación - Framework PHP Laravel y Javascript</h1>
			<p class="lead mb-0">Desarrollar una Aplicación - API para categorías y productos.</p>
		</div>
	</div>

	<div class="container">
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
	
	
	<script scr="js/jquery-3.5.0.min.js"></script>
	<script scr="js/bootstrap.min.js"></script>

	<!-- este recurso es requerido por el carousel -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- Javascript -->
	<script type="text/javascript">	
		
		function categorias(){
			var r = new XMLHttpRequest();
			r.open("GET", "api/categorias", true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
			  document.getElementById("div_categorias").innerHTML=r.responseText;
			};
			r.send();
		}

		/* consulta el api productos de una categoria con el boton productos */
		function categoriaProductos(btn){
			document.getElementById("div_categoria_productos").innerHTML='';
	        var r = new XMLHttpRequest();
			r.open("GET", "api/categorias/"+btn.value+"/productos", true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
			  document.getElementById("div_categoria_productos").innerHTML=r.responseText;
			};
			r.send();
	    };

	    /* consulta el api productos de una categoria con el boton productos */
		function categoriaElimina(btn){
	        var r = new XMLHttpRequest();
			r.open("DELETE", "api/categorias/"+btn.value, true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				categorias();
			};
			r.send();
	    };

	    function categoriaConsulta(btn){
	    	var r = new XMLHttpRequest();
			r.open("GET", "api/categorias/"+btn.value, true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;				
				document.getElementById("div_editarcategorias").innerHTML=r.responseText;
			};
			r.send();
	    }

	    function categoriaActualiza(btn){
	    	var id        		= document.getElementById("categoriaid_m").value;
	    	var nombre        	= document.getElementById("nombre_m").value;
	    	var descripcion     = document.getElementById("descripcion_m").value;
           
            var dataString      = "?id="+id+"&nombre="+nombre+"&descripcion="+descripcion;
                
	    	var r = new XMLHttpRequest();
			r.open("POST", "api/categoriasedit"+dataString, true);
			r.onreadystatechange = function () {
				if (r.readyState != 4 || r.status != 200) return;
				categorias();
			};
			r.send();
	    }

		/* consulta el api categorias al cargar la página */
		window.onload = function(){
			categorias();
		}

	</script>

</body>
</html>