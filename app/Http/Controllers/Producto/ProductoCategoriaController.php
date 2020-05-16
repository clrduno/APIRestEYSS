<?php

namespace App\Http\Controllers\Producto;

use App\Categoria;
use App\Http\Controllers\ApiController;
use App\Producto;
use Illuminate\Http\Request;

class ProductoCategoriaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Producto $producto)
    {
        $categorias = $producto->categorias;

        return view('productos.indexcategorias', ['producto'=>$producto,'categorias'=>$categorias]);
    }

}
