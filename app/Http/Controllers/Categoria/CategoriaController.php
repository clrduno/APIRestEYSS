<?php

namespace App\Http\Controllers\Categoria;

use App\Categoria;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
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

        //return $this->showAll($categorias);
        return view("categorias.index", ["categorias"=>$categorias]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $categoria->fill($request->intersect([
            'nombre',
            'descripcion',
        ]));

        //determina si los valores de la instancia ha cambiado
        if ($categoria->isClean()) {
            return $this->errorResponse('Debe especificar al menos un valor difrente para actualizar', 422);
        }        

        $categoria->save();

        return $this->showOne($categoria);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return $this->showOne($categoria);
    }
}
