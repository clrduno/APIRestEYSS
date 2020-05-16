<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function categorias()
    {
        return view('categorias.categorias');
    }

    public function productos()
    {
        return view('productos.productos');
    }

    public function contacto()
    {
        return view('contacto.contacto');
    }
}
