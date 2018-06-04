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
            $table->date('dtFinalInscricao')->nullable();
            $table->date('dtInicialRelatorio')->nullable();
            $table->date('dtFinalRelatorio')->nullable();
            $table->date('dtInicialTCC')->nullable();
            $table->date('dtFinalTCC')->nullable();
            $table->date('dtInicialInscricaoBanca')->nullable();
            $table->date('dtFinalInscricaoBanca')->nullable();
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
