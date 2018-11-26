<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvolucoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evolucoes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('data')->nullable();
            $table->time('horario')->nullable();
            $table->integer('pacientes_id')->nullable();
            $table->integer('inscricoes_individuais_id')->nullable();
            $table->integer('alunos_id')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('numero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evolucoes');
    }
}
