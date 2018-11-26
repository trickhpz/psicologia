<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesIndividuaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes_individuais', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pacientes_id')->unsigned();
            $table->date('data');
            $table->string('modalidade',12);
            $table->integer('numeroProntuario')->unsigned();

//                  RESPONSAVEL
            $table->string('nomeResponsavel',80)->nullable();
            $table->string('rgResponsavel',80)->nullable();
            $table->string('cpfResponsavel',10)->nullable();
            $table->string('parentescoResponsavel',80)->nullable();
            $table->double('rendaResponsavel')->nullable();
            $table->string('profissaoResponsavel',80)->nullable();
//                  FIM-RESPONSAVEL

            $table->boolean('pacienteInterno')->nullable();
            $table->string('nomeCurso',30)->nullable();
            $table->string('professor',60)->nullable();
            $table->string('setorFuncionario',60)->nullable();
            $table->boolean('pacienteComunidade')->nullable();
            $table->string('responEncaminhamento',60)->nullable();
            $table->time('horario')->nullable();
            $table->string('diaSemama',15)->nullable();







        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricoes_individuais');
    }
}
