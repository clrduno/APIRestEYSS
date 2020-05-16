<div class="row"> 
    <div class="col">
            <div class="d-flex justify-content-center">
                <h3>Categorías</h3>
             </div>

            <div class="table-responsive">
                
                <table class="table table-striped table-bordered table-hover table-sm ">
                        <thead class="thead-default">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </thead>
                        @if(isset($categorias))               
                            @foreach($categorias as $cat)
                                <tr>                                
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->nombre }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cr-modal-productos" onclick="categoriaProductos(this)" value="{{ $cat->id }}">Productos</button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cr-modal-eliminar{{ $cat->id }}" value="{{ $cat->id }}">Eliminar</button>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#cr-modal-editar" onclick="categoriaConsulta(this)" value="{{ $cat->id }}">Editar</button>
                                    </td>
                                    @include('categorias.modal_categoriaeliminar')
                                </tr>
                            @endforeach
                        @endif
                    </table>
            </div>
    </div>
</div>             
