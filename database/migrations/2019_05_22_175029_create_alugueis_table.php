<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlugueisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alugueis', function (Blueprint $table) {
            $table->increments('id');
			$table->date('dataAluguel');
			$table->date('dataEntrega');
			$table->integer('filmes_id')->unsigned();
			$table->integer('clientes_id')->unsigned();
            $table->timestamps();
			
			$table->foreign('filmes_id')->references('id')->on('filmes');
			$table->foreign('clientes_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alugueis');
    }
}
