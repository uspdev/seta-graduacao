<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabalhoAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabalhos_academicos', function (Blueprint $table) {
            #FKs
            $table->integer('idEdital')->unsigned();
            $table->integer('idAluno')->unsigned();
            
            $table->string('lattesUrl')
                ->comment('Link do Lattes do Aluno')
                ->nullable();
            $table->string('projetoPesquisa')
                ->comment('Arquivo em PDF do proejeto de pesquisa do aluno')
                ->nullable();
            $table->string('relatorioParcial')
                ->comment('Arquivo em PDF do relatório parcial do aluno')
                ->nullable();
            $table->string('trabalhoAcademico')
                ->comment('Arquivo em PDF do TCC pronto para enviar ao orientador e membros da banca')
                ->nullable();
            $table->date('dataApresentacao')
                ->comment('Data da apresentação do TCC')
                ->nullable();
            $table->boolean('validado')
                ->default(false)
                ->comment('Verificação do serviço de graduação se o aluno está apto a se inscrever no sistema');
            $table->timestamps();
            
            # Constraints
            $table->primary(['idEdital', 'idAluno']);            
            $table->foreign('idEdital')->references('id')->on('editais');
            $table->foreign('idAluno')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabalho_academicos');
    }
}
