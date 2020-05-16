<div class="row"> 
    <div class="col">
            <div class="d-flex justify-content-center">
                <h3>Productos</h3>
            </div>
            <div class="table-responsive">                
                <table class="table table-striped table-bordered table-hover table-sm ">
                        <thead class="thead-default">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Estatus</th>
                            <th>Opciones</th>
                        </thead>
                        @if(isset($productos))               
                            @foreach($productos as $pro)
                                <tr>                                
                                    <td>{{ $pro->id }}</td>
                                    <td>{{ $pro->nombre }}</td>
                                    <td>{{ $pro->cantidad }}</td>
                                    <td>{{ $pro->estatus }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cr-modal-categorias" onclick="productoCategorias(this)" value="{{ $pro->id }}">Categorías</button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cr-modal-eliminar{{ $pro->id }}" value="{{ $pro->id }}">Eliminar</button>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#cr-modal-editar" onclick="productoConsulta(this)" value="{{ $pro->id }}">Editar</button>
                                    </td>
                                    @include('productos.modal_productoeliminar')
                                </tr>
                            @endforeach
                        @endif
                    </table>
            </div>
    </div>
</div>   