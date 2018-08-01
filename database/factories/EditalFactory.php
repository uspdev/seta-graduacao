<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
use Carbon\CarbonInterval;

$factory->define(App\Edital::class, function (Faker $faker) {
    $ano = $faker->unique()->year;
    $mes = $faker->month;
    $dia = $faker->dayOfMonth;
    $data = $ano.'-'.$mes.'-'.$dia;
    $now = Carbon::createFromFormat('Y-m-d', $data);
    $publicacao_resultados = Carbon::createFromFormat('Y-m-d', $data)->addMonths(1)->addWeek(1);
    $final_relatorio = Carbon::createFromFormat('Y-m-d', $data)->addMonths(7)->addWeek(1)->toDateString();
    return [
        'anoReferencia' => $now->year,
        'dtInicialInscricao' => $now->toDateString(),
        'dtFinalInscricao' => $now->addMonths(1)->toDateString(),
        'dtPublicacaoResultados' => $publicacao_resultados->toDateString(),
        'dtInicialRelatorio' => $now->addMonths(1)->toDateString(),
        'dtFinalRelatorio' => $final_relatorio,
        'dtInicialTCC' => $publicacao_resultados->toDateString(),
        'dtFinalTCC' => $now->addYear(1)->toDateString(),
        'dtInicialInscricaoBanca' => $publicacao_resultados->toDateString(),
        'dtFinalInscricaoBanca' => $now->toDateString(),
        'dtInicialApresentacaoTCC' => $now->addWeek(1)->toDateString(),
        'dtFinalApresentacaoTCC' => $now->addMonths(2)->toDateString(),
        'ativo' => $faker->boolean
    ];
});

$factory->state(App\Edital::class, 'this_year', function (Faker $faker) {
    $now = Carbon::now();
    $publicacao_resultados = Carbon::now()->addMonths(1)->addWeek(1);
    $final_relatorio = Carbon::now()->addMonths(7)->addWeek(1)->toDateString();
    return [
        'anoReferencia' => $now->year,
        'dtInicialInscricao' => $now->toDateString(),
        'dtFinalInscricao' => $now->addMonths(1)->toDateString(),
        'dtPublicacaoResultados' => $publicacao_resultados->toDateString(),
        'dtInicialRelatorio' => $final_relatorio,
        'dtFinalRelatorio' => $now->addMonths(1)->toDateString(),
        'dtInicialTCC' => $publicacao_resultados->toDateString(),
        'dtFinalTCC' => $now->addYear(1)->toDateString(),
        'dtInicialInscricaoBanca' => $publicacao_resultados->toDateString(),
        'dtFinalInscricaoBanca' => $now->toDateString(),
        'dtInicialApresentacaoTCC' => $now->addWeek(1)->toDateString(),
        'dtFinalApresentacaoTCC' => $now->addMonths(2)->toDateString(),
        'ativo' => 1,
    ];
});


$factory->state(App\Edital::class, 'year_ago', function (Faker $faker) {
    $now = Carbon::now();
    $now->subYear();

    $publicacao_resultados = Carbon::now()->addMonths(1)->addWeek(1)->subYear();
    $final_relatorio = Carbon::now()->addMonths(7)->addWeek(1)->subYear()->toDateString();
    // dump($publicacao_resultados);
    return [
        'anoReferencia' => $now->year,
        'dtInicialInscricao' => $now->toDateString(),
        'dtFinalInscricao' => $now->addMonths(1)->toDateString(),
        'dtPublicacaoResultados' => $publicacao_resultados->toDateString(),
        'dtInicialRelatorio' => $final_relatorio,
        'dtFinalRelatorio' => $now->addMonths(1)->toDateString(),
        'dtInicialTCC' => $publicacao_resultados->toDateString(),
        'dtFinalTCC' => $now->addYear(1)->toDateString(),
        'dtInicialInscricaoBanca' => $publicacao_resultados->toDateString(),
        'dtFinalInscricaoBanca' => $now->toDateString(),
        'dtInicialApresentacaoTCC' => $now->addWeek(1)->toDateString(),
        'dtFinalApresentacaoTCC' => $now->addMonths(2)->toDateString(),
        'ativo' => 1,
    ];
});

$factory->state(App\Edital::class, 'unactive', function (Faker $faker) {
    $now = Carbon::now();
    $now->subYear(2);

    $publicacao_resultados = Carbon::now()->addMonths(1)->addWeek(1)->subYear();
    $final_relatorio = Carbon::now()->addMonths(7)->addWeek(1)->subYear()->toDateString();
    // dump($publicacao_resultados);
    return [
        'anoReferencia' => $now->year,
        'dtInicialInscricao' => $now->toDateString(),
        'dtFinalInscricao' => $now->addMonths(1)->toDateString(),
        'dtPublicacaoResultados' => $publicacao_resultados->toDateString(),
        'dtInicialRelatorio' => $final_relatorio,
        'dtFinalRelatorio' => $now->addMonths(1)->toDateString(),
        'dtInicialTCC' => $publicacao_resultados->toDateString(),
        'dtFinalTCC' => $now->addYear(1)->toDateString(),
        'dtInicialInscricaoBanca' => $publicacao_resultados->toDateString(),
        'dtFinalInscricaoBanca' => $now->toDateString(),
        'dtInicialApresentacaoTCC' => $now->addWeek(1)->toDateString(),
        'dtFinalApresentacaoTCC' => $now->addMonths(2)->toDateString(),
        'ativo' => 0,
    ];
});