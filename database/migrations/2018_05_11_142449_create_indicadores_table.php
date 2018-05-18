<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_oportunidad')->unsigned();
            $table->integer('pre_calificacion')->nullable();
            $table->bigInteger('reserva_ponderadas_monto')->nullable();
            $table->bigInteger('capital_monto')->nullable();
            $table->longText('raroc')->nullable();
            $table->longText('rorac')->nullable();
            $table->longText('ventas_anuales')->nullable();
            $table->bigInteger('reserva_ponderas_porcentaje')->nullable();
            $table->bigInteger('capital_porcentaje')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('indicadores', function (Blueprint $table) {
            $table->index('id_oportunidad', 'my_id_oportunidad_indicadores');
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
        Schema::dropIfExists('indicadores');
    }
}
