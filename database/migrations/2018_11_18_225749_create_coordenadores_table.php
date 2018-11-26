<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordenadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordenadores', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome',80);
            $table->string('rg',80);
            $table->string('orgaoEmissor',20)->nullable();
            $table->string('ufRg',2)->nullable();
            $table->string('cpf',10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coordenadores');
    }
}
