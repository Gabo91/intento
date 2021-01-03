<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('numero');
            $table->integer('id_materia')->unsigned();
            $table->integer('sis_usuario')->unsigned();
            $table->timestamps();
        });
        Schema::table('grupos', function($table){
            $table->foreign('id_materia')->references('id')->on('materias');
            $table->foreign('sis_usuario')->references('cod_sis')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
