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
    public function deveriaRetornarUmEdital()
    {
        factory(\App\Edital::class)->states('year_ago')->create();
        factory(\App\Edital::class)->create();
        
        //
        // $editais = Edital::all();
        // dump($editais);
        //

        $edital_model = new Edital();
        $ano_atual = new Carbon();

        $edital_atual = $edital_model->getEditalPorAno($ano_atual);
        dump($edital_atual);
        // $this->assertEquals(1, count($edital_atual));
        $this->assertEquals(2018, $edital_atual->anoReferencia);
    }
}
