<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        @if(isset($producto))
            <h3>{{$producto->nombre}}</h3>   
        @endif        
    </div>
</div>

<div class="row"> 
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover ">
                <thead class="thead-default">
                    <th>ID</th>
                    <th>Nombre</th>
                </thead>
                @if(isset($categorias))               
                    @foreach($categorias as $cat)
                        <tr>                                
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->nombre }}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
</div>             
