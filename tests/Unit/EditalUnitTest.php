<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Edital;
use Carbon\Carbon;

class EditalUnitTest extends TestCase
{
    /**
     * O Teste deve retornar o edital do ano referido, caso exista.
     * @test
     * @return void
     */
    public function deveriaRetornarEditalDoAnoSolicitado()
    {
        factory(\App\Edital::class)->states('year_ago')->create();
        factory(\App\Edital::class)->states('this_year')->create();

        $edital_model = new Edital();
        $ano_atual = new Carbon();

        $edital_atual = $edital_model->getEditalPorAno($ano_atual);
        $this->assertEquals(2018, $edital_atual->anoReferencia);
    }

    /** @test */
    public function deveriaRetornarEditaisAtivos()
    {
        factory(\App\Edital::class)->states('year_ago')->create();
        factory(\App\Edital::class)->states('this_year')->create();
        factory(\App\Edital::class)->states('unactive')->create();

        $edital_model = new Edital();
        $ativos = $edital_model->getEditaisAtivos();
        $todos = \App\Edital::all();

        $this->assertEquals(2, count($ativos));
        $this->assertEquals(3, count($todos));
    }
}
