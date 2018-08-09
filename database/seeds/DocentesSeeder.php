<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Uspdev\Replicado\Pessoa;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docentes_ativos = Pessoa::docentesAtivos(89);
        $now = new Carbon();
        foreach ($docentes_ativos as $docente) {
            if (strpos($docente['nomfnc'], 'Contratado') === false) {
                DB::table('users')->insert([
                    'id' => $docente['codpes'],
                    'name' => $docente['nompes'],
                    'email' => $docente['codema'],
                    'tipoVinculo' => 'DOCENTE',
                    "created_at" => $now,
                    "updated_at" => $now,
                ]);
            }
        }
    }
}
