<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editais', function (Blueprint $table) {
            $table->increments('id');
            $table->year('anoReferencia')->unique();

            $table->date('dtInicialInscricao')->nullable();
            $table->date('dtFinalInscricao')
                ->comment('Finaliza em média 1 mês depois da data do edital')
                ->nullable();

            $table->date('dtPublicacaoResultados')
                ->comment('Finaliza em média 1 semana depois da data final da inscrição')
                ->nullable();

            $table->date('dtInicialRelatorio')
                ->comment('Inicia junto com a publicação dos resultados')
                ->nullable();
            $table->date('dtFinalRelatorio')
                ->comment('Finaliza em média após 6 meses da data dos resultados')
                ->nullable();

            $table->date('dtInicialTCC')
                ->comment('Inicia junto com a publicação dos resultados')
                ->nullable();
            $table->date('dtFinalTCC')
                ->comment('Finaliza em média após 12 meses da data dos resultados')
                ->nullable();

            $table->date('dtInicialInscricaoBanca')
                ->comment('Inicia junto com a publicação dos resultados')
                ->nullable();
            $table->date('dtFinalInscricaoBanca')
                ->comment('Finaliza junto com a data final do TCC')
                ->nullable();

            $table->date('dtInicialApresentacaoTCC')
                ->comment('Inicia em média após 1 semana da data final do TCC')
                ->nullable();
            $table->date('dtFinalApresentacaoTCC')
                ->comment('Finaliza em média após 2 meses da data inicial da apresentacao dos TCC')
                ->nullable();

            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editais');
    }
}
