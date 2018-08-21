<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcoesOrientadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcoes_orientadores', function (Blueprint $table) {
            #FKs
            $table->integer('idEdital')->unsigned();
            $table->integer('idAluno')->unsigned();
            $table->integer('idOrientador')->unsigned();
            
            $table->tinyinteger('opcaoOrientador')
                  ->comment('Prioridade de preferência do orientador');
            $table->boolean('aceite')
                  ->nullable()
                  ->comment('Aceite do Orientador');
            $table->timestamps();

             # Constraints
             $table->primary(['idEdital', 'idAluno', 'idOrientador']);            
             $table->foreign('idEdital')->references('idEdital')->on('trabalhos_academicos');
             $table->foreign('idAluno')->references('idAluno')->on('trabalhos_academicos');
             $table->foreign('idOrientador')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opcoes_orientadores');
    }
}
