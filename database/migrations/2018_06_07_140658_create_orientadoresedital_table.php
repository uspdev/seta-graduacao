<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrientadoreseditalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orientadoresEdital', function (Blueprint $table) {

            # FKs
            $table->integer('idEdital')->unsigned();
            $table->integer('idOrientador')->unsigned();

            $table->text('temasOrientacao')->nullable();
            $table->tinyinteger('numVagas');
            $table->timestamps();
            
            # Constraints
            $table->primary(['idEdital', 'idOrientador']);            
            $table->foreign('idEdital')->references('id')->on('editais');
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
        Schema::dropIfExists('orientadoresEdital');
    }
}
