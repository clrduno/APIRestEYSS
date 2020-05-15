<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_producto', function (Blueprint $table) {
            $table->biginteger('categoria_id')->unsigned();
            $table->biginteger('producto_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('categorias');            
            $table->foreign('producto_id')->references('id')->on('productos');   
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_producto');
    }
}
