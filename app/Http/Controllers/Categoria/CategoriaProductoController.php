<?php

namespace App\Http\Controllers\Categoria;

use App\Categoria;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class CategoriaProductoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Categoria $categoria)
    {
        $productos = $categoria->productos;

        return view('categorias.indexproductos', ['productos'=>$productos,'categoria'=>$categoria]);
    }

}
