<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormularioAvanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario_avances', function (Blueprint $table) {
            $table->increments('id')->unique();
            //$table->('id_reporte_mensual');
            $table->string('tipo_clase');
            $table->string('modalidad');
            $table->date('reposicion')->nullable(true);
            $table->string('dia_clase');
            $table->date('dia_reposicion')->nullable(true);
            $table->string('plataformas')->nullable(true);
            $table->string('herramientas')->nullable(true);
            $table->text('contenido');
            $table->text('observaciones');
            $table->string('url')->nullable(true);
            $table->string('subir_contenido')->nullable(true);
            $table->timestamps();
            $table->integer('codigo_materia');
            $table->integer('sis_usuario')->unsigned();
        });
        Schema::table('formulario_avances', function($table){
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
        Schema::dropIfExists('formulario_avances');
    }
}
