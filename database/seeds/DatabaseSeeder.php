<?php

use App\User;
use App\Producto;
use App\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        DB::table('categoria_producto')->truncate();
        Producto::truncate();
        Categoria::truncate();
        User::truncate();
                
        $cantidadUsuarios = 6;
        $cantidadCategorias = 10;
        $cantidadProductos = 100;
        $cantidadTransactions = 10;

        factory(User::class, $cantidadUsuarios)->create();
        factory(Categoria::class, $cantidadCategorias)->create();

		factory(Producto::class, $cantidadTransactions)->create()->each(
			function ($producto) {
				$categorias = Categoria::all()->random(mt_rand(1, 5))->pluck('id');
				$producto->categorias()->attach($categorias);
			}
		);

    }
}
