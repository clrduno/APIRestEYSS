<body>

	@yield('cabecera_imagen')

	<div class="container">
		<div class="row">
			<div class="col-12 mt-0">
				@include('layouts.menu')
			</div>
		</div>		
	</div>

	@yield('slider')

	@yield('contenido')

	@include('layouts.piedepagina')
	
	@section('script')
    	@include('layouts.script')
    @show
	
</body>
</html>