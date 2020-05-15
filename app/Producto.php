<?php

namespace App;

use App\Categoria;
use App\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    const PRODUCTO_DISPONIBLE = 'disponible';
    const PRODUCTO_NO_DISPONIBLE = 'no disponible';

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'nombre',
    	'descripcion',
    	'cantidad',
    	'estatus',
    	'imagen',    	
    ];

    protected $hidden = [
    	'pivot'
    ];

    public function estaDisponible()
    {
    	return $this->estatus == Producto::PRODUCTO_DISPONIBLE;
    }

    public function categorias()
    {
    	return $this->belongsToMany(Categoria::class);
    }
}
