<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\ApiController;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();

        return view("productos.index", ["productos"=>$productos]);
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view("productos.edit", ["producto"=>$producto]);
    }



    public function productoseditajax(Request $request)
    {
        if (!$request->isMethod('post')){
            return 'El método debe ser post';
        }

        $producto=Producto::findOrFail($request->get('id')); 
        
        $rules = [  
            'nombre'=>'required|min:1|max:30',
            'descripcion'=>'required|min:1|max:1000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()){
            $producto->nombre      =$request->get('nombre');
            $producto->descripcion =$request->get('descripcion'); 

            if ($producto->update()==1){
                return 'Exitosa';
            }else{
                return 'Falló';
            } 
        }else{
            return 'Falló';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete(); 

        return $this->showOne($producto);
    }
}
