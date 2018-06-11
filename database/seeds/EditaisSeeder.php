<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EditaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new Carbon();
        $last = $now->subYear();
        DB::table('editais')->insert([
            [
                'id' => 1,
                'anoReferencia' => $now->year,
                'dtInicialInscricao' => $now,
                'dtFinalInscricao' => $now->addMonths(6),
                'dtInicialRelatorio' => $now,
                'dtFinalRelatorio' => $now->addMonths(1),
                'dtInicialTCC' => $now->addMonths(2),
                'dtFinalTCC' => $now->addMonths(3),
                'dtInicialInscricaoBanca' => $now->addMonths(4),
                'dtFinalInscricaoBanca' => $now->addMonths(5),
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                'id' => 2,
                'anoReferencia' => $last->year,
                'dtInicialInscricao' => $last,
                'dtFinalInscricao' => $last->addMonths(6),
                'dtInicialRelatorio' => $last,
                'dtFinalRelatorio' => $last->addMonths(1),
                'dtInicialTCC' => $last->addMonths(2),
                'dtFinalTCC' => $last->addMonths(3),
                'dtInicialInscricaoBanca' => $last->addMonths(4),
                'dtFinalInscricaoBanca' => $last->addMonths(5),
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
