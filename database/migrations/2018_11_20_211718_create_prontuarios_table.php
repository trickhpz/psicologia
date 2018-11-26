<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProntuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prontuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('terapeutas_id')->nullable();
            $table->integer('coordenadores_id')->nullable();
            $table->integer('pacientes_id')->nullable();
            $table->date('dataAtendimento')->nullable();
            $table->time('horarioAtendimento')->nullable();
            $table->integer('numeroAtendimento')->nullable()->unsigned();
            $table->date('data')->nullable();
            $table->string('tipoAtendimento',20)->nullable();
            $table->string('descricaoAtendimento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prontuarios');
    }
}
