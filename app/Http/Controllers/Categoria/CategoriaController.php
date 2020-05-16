<?php

namespace App\Http\Controllers\Categoria;

use App\Categoria;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class CategoriaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();

        return view("categorias.index", ["categorias"=>$categorias]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        return view("categorias.edit", ["categoria"=>$categoria]);
    }


    public function categoriaseditajax(Request $request)
    {
        if (!$request->isMethod('post')){
            return 'El método debe ser post';
        }

        $categoria=Categoria::findOrFail($request->get('id')); 
        
        $rules = [  
            'nombre'=>'required|min:1|max:30',
            'descripcion'=>'required|min:1|max:1000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if (!$validator->fails()){
            $categoria->nombre      =$request->get('nombre');
            $categoria->descripcion =$request->get('descripcion'); 

            if ($categoria->update()==1){
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
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $productos = $categoria->productos();

        return DB::transaction(function () use ($productos, $categoria){
            $productos->delete(); 
            $categoria->delete();

            return $this->showOne($categoria);
        });    
    }
}
