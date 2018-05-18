<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_oportunidad')->unsigned();
            $table->date('fecha_asignacion_expediente')->nullable();
            $table->date('fecha_firma_estados_credito')->nullable();
            $table->date('fecha_aprobacion_acta')->nullable();
            $table->date('fecha_reunion')->nullable();
            $table->longText('opinion_valor')->nullable();
            $table->longText('analista')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('evaluaciones', function (Blueprint $table) {
            $table->index('id_oportunidad', 'my_id_oportunidad_evaluaciones');
            $table->foreign('id_oportunidad')->references('id')->on('oportunidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones');
    }
}
