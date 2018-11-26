<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome',80);
            $table->string('rg',80);
            $table->string('orgaoEmissor',25)->nullable();
            $table->string('ufRg',2)->nullable();
            $table->string('cpf',10);
            $table->integer('rgm')->unsigned()->nullable();
            $table->string('iniciaisPaciente',10)->nullable();
            $table->string('telResidencial',9)->nullable();
            $table->string('telCelular',9);
            $table->string('operadoraCel',20)->nullable();
            $table->string('telTrabalho',9)->nullable();
            $table->string('telRecado',9)->nullable();
            $table->string('nomeRespRecado',80)->nullable();
            $table->date('nascimento');
            $table->integer('idadeAtual')->unsigned()->nullable();
            $table->string('sexo',1)->nullable();
            $table->string('endereco',100)->nullable();
            $table->string('bairro',40)->nullable();
            $table->string('uf',2)->nullable();
            $table->string('cep',9)->nullable();
            $table->string('profissao',30)->nullable();
            $table->double('renda')->nullable();
            $table->boolean('possuiNecessEspecial')->nullable();
            $table->string('qualNecessEspecial',60)->nullable();
            $table->boolean('participaProgSocial')->nullable();
            $table->string('qualProgSocial',60)->nullable();
            $table->string('anotacao',600)->nullable();
            $table->string('statusAtendimento',80)->nullable();
            $table->dateTime('agendamento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
