<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'descripcion'=>$faker->paragraph(1),        
    ];
});
