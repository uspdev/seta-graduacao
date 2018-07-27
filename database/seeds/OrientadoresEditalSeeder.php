<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrientadoresEditalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new Carbon();
        DB::table('orientadores_edital')->insert([
            [
                'idEdital' => 1,
                'idOrientador' => 123,
                'temasOrientacao' => 'Banana',
                'numVagas' => 4,
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                'idEdital' => 1,
                'idOrientador' => 456,
                'temasOrientacao' => 'Abacate',
                'numVagas' => 2,
                "created_at" => $now,
                "updated_at" => $now,              
            ],
            [
                'idEdital' => 2,
                'idOrientador' => 123,
                'temasOrientacao' => 'Abobora',
                'numVagas' => 5,
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
