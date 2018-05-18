<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOportunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oportunidades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_prospecto')->unsigned();
            $table->integer('tipo_registro')->nullable();
            $table->string('nombre')->nullable();
            $table->string('nombre_cliente')->nullable();
            $table->integer('aprobador')->nullable();
            $table->bigInteger('ingresos')->nullable();
            $table->integer('tipo')->nullable();
            $table->integer('id_etapa')->nullable();
            $table->integer('id_etapa_documentos')->nullable();
            $table->integer('estatus_credito')->nullable();
            $table->bigInteger('probabilidad')->nullable();
            $table->bigInteger('numero_cuenta')->nullable();
            $table->string('campaña')->nullable();
            $table->string('osag')->nullable();
            $table->string('ran3')->nullable();
            $table->string('ran4')->nullable();
            $table->string('tipo_persona')->nullable();
            $table->dateTime('fecha_cierre')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('oportunidades', function (Blueprint $table) {
            $table->index('id_prospecto', 'my_id_prospecto_oportunidades');
            $table->foreign('id_prospecto')->references('id')->on('prospectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oportunidades');
    }
}
