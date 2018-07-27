<?php

use Faker\Generator as Faker;

$factory->define(App\TrabalhoAcademico::class, function (Faker $faker) {
    return [
        // 'idEdital' => $faker->randomNumber(3),
        // 'idAluno' => $faker->randomNumber(8),
        'idEdital' => function () {
            return factory(App\Edital::class)->create()->id;
        },
        'idAluno' => function () {
            return factory(App\User::class)->create()->id;
        },
        'lattesUrl' => $faker->url,
        'projetoPesquisa' => '/arquivos/' . $faker->word . '.pdf',
        'relatorioParcial' => '/arquivos/' . $faker->word . '.pdf',
        'trabalhoAcademico' => '/arquivos/' . $faker->word . '.pdf',
        'dataApresentacao' => $faker->date(),
        'validado' => $faker->boolean
    ];
});