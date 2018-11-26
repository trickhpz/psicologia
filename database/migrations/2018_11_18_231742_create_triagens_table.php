<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triagens', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pacientes_id')->unsigned();

            $table->date('dataAtual')->nullable();
            $table->string('tipoEncaminhamento',60)->nullable();
            $table->string('motivoEncaminhamento')->nullable();
            $table->string('queixa')->nullable();
            $table->boolean('realizaTratamentoPsico')->nullable();
            $table->string('tempoTratamentoPsico',20)->nullable();
            $table->boolean('FamiliaRealizaTratPsico')->nullable();
            $table->string('nomesFamiliares')->nullable();
            $table->boolean('habitoAutoMedicar')->nullable();
            $table->string('tempoAutoMedicacao',20)->nullable();
            $table->string('medicamentoUtilizado',60)->nullable();
            $table->boolean('medicacaoPsiquiatrica')->nullable();
            $table->string('medicamentoPsiquiatrico',60)->nullable();
            $table->string('tempoMedicamentoPsiquiatrico',20)->nullable();
            $table->string('ultimoMedicoPsiquiatra',80)->nullable();
            $table->boolean('historicoInternacao')->nullable();
            $table->string('quandoHistoricoInternacao',60)->nullable();
            $table->boolean('tratamentoConcluido')->nullable();
            $table->string('nomeInstituicaoInternacao',80)->nullable();
            $table->boolean('usoAbusivoDrogas')->nullable();
            $table->string('substanciaPsicoativa',80)->nullable();    
            $table->string('tipoAtividadeProfissional',60)->nullable();
            $table->boolean('temCriancaAdolescente')->nullable();
            $table->string('periodoEstudo',20)->nullable();
            $table->string('nomeEscola',60)->nullable();
            $table->time('horarioDisponivel')->nullable();
            $table->string('sinteseCaso')->nullable();
            $table->string('encaminhamentoSugerido',60)->nullable();
            $table->string('motivoUrgencia',80)->nullable();
            $table->string('tipoModalidadeAtendimento',20)->nullable();
            $table->date('dataTriagem')->nullable();
            $table->integer('alunos_id')->nullable()->unsigned();
            $table->date('andamento')->nullable();
            $table->string('tipoAndamento',25)->nullable();
            $table->integer('coordenadores_id')->nullable()->unsigned();
            $table->string('cienciaEquipe',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('triagens');
    }
}
