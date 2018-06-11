<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new Carbon();
        DB::table('users')->insert([
            [
                'id' => 123,
                'name' => 'ABCDE',
                'email' => 'abc@def.gh',
                'tipoVinculo' => 'DOCENTE',
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                'id' => 456,
                'name' => 'GHIJK',
                'email' => 'lmn@opq.rs',
                'tipoVinculo' => 'DOCENTE',
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
