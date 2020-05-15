<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion'=>$faker->paragraph(1),
        'cantidad'=>$faker->numberBetween(1,10),
        'estatus'=>$faker->randomElement([Producto::PRODUCTO_DISPONIBLE, Producto::PRODUCTO_NO_DISPONIBLE]),
        'imagen'=>$faker->randomElement(['1.jpg','2.jpg','3.jpg']),
    ];
});
