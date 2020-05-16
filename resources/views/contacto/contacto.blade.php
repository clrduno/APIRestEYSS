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
	<main>
		<div class="container" style="margin-top: 30px;">
			<!-- Sección Acerca de -->
			<div class="row acerca-de align-items-center">
				<div class="col-12 col-lg-4 foto">
					<img src="img/Mirostro200x200.jpg" class="rounded-circle img-fluid" alt="">
					<p class="nombre">Carlos Luís</p>
				</div>
				<div class="col-12 col-lg-8 info">
					<h2 class="titulo">Acerca de</h2>
					<p class="resumen">Lcdo. Admón, Mención Informática</p>
					<p class="resumen">Mcs. Informática Gerencial</p>

					<p class="label">HTML</p>
					<div class="progress">
						<div class="progress-bar" style="width: 95%;">95%</div>
					</div>
					<p class="label">CSS</p>
					<div class="progress">
						<div class="progress-bar" style="width: 70%;">70%</div>
					</div>
					<p class="label">JS</p>
					<div class="progress">
						<div class="progress-bar" style="width: 80%;">80%</div>
					</div>
					<p class="label">LARAVEL</p>
					<div class="progress">
						<div class="progress-bar" style="width: 80%;">80%</div>
					</div>
				</div>
			</div>

			<!-- Sección Contacto -->
			<div class="row contacto justify-content-center">
				<div class="col-12 col-lg-8">
					<h2 class="titulo">Contacto</h2>
					<form action="" class="formulario">
						<div class="form-group row">
							<div class="col-12 col-md-6">
								<input type="text" name="" id="" placeholder="Nombre">
							</div>
							<div class="col-12 col-md-6">
								<input type="email" name="" id="" placeholder="Correo">
							</div>
						</div>
						<textarea name="" id="" placeholder="Mensaje"></textarea>
						<div class="form-group d-flex justify-content-center">
							<input type="submit" class="boton" value="Enviar">
						</div>
					</form>
				</div>
			</div>
		</div>	
	</main>
	

@endsection	

@section('script')
    @parent
    
@stop