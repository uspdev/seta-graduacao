<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListarTemasVagasTest extends TestCase
{
    /**
     *@test
     *
     * @return void
     */
    public function deveriaAcessarPaginaTemasVagas()
    {
        $user = factory(\App\User::class)->make();
        $user->id = "123";
        $edital = factory(\App\Edital::class)->create();
        
        dump($user->toArray());

        $this->actingAs($user);

        $response = $this->get('/cadtema');
        $response
            ->assertSuccessful()
            ->assertSee("tema e quantidade");

    }
    /** @test */
    public function deveriaRedirecionarParaHome()
    {
        $response = $this->get('/cadtema');
        $response
            ->assertStatus(302)
            ->assertRedirect("/");
    }
}
