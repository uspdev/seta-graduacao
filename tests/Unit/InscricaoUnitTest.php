<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InscricaoUnitTest extends TestCase
{
    /**
     * A basic test example.
     *@test
     * @return void
     */
    public function paginaDisponivel()
    {
        $response = $this->call('get', '/inscricao');
        $response->assertStatus(200);
        $response->assertViewIs('aluno.inscricao');
        $response->assertSee('Inscrição');
    }
}
