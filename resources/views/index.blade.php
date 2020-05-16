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
				<div class="row justify-content-center">
					<h2 class="titulo">BIENVENIDOS</h2>
				</div>
			</div>
		</div>
	</div>

@endsection	

@section('script')
    @parent
    
@stop
	
	