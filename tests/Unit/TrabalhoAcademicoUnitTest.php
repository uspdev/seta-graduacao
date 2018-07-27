<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\TrabalhoAcademico;

class TrabalhoAcademicoUnitTest extends TestCase
{
    /**
     * Teste de factory
     *@test
     * @return void
     */
    public function factory()
    {
        factory(\App\TrabalhoAcademico::class, 10)->create();
        dump(\App\TrabalhoAcademico::all());
    }
}
