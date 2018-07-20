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
        factory(\App\Edital::class)->states('year_ago')->create();
        factory(\App\Edital::class)->create();
    }
}
