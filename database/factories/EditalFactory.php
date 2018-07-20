<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
use Carbon\CarbonInterval;

$factory->define(App\Edital::class, function (Faker $faker) {
    $now = Carbon::now();
    $publicacao_resultados = Carbon::now()->addMonths(1)->addWeek(1);
    $final_relatorio = Carbon::now()->addMonths(7)->addWeek(1)->toDateString();
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