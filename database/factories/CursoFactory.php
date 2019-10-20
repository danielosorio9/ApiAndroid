<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Curso::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text(50),
        'descripcion' => $faker->paragraph(3, true),
        'icono' => $faker->imageUrl(400, 400),
        'portada' => $faker->imageUrl(640, 420),
        'video_url' => $faker->url,
        'etiquetas' => $faker->text(50),
        'profesor_id' => function () {
            return factory(App\Profesor::class)->create()->id;
        },
        'categoria_id' => function () {
            return factory(App\Categoria::class)->create()->id;
        },

    ];
});
