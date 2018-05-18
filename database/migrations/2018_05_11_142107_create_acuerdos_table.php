<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcuerdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acuerdos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_oportunidad')->unsigned();
            $table->date('fecha_acuerdo')->nullable();
            $table->integer('tipo_alta_credito')->nullable();
            $table->integer('art_73')->nullable();
            $table->longText('sector_economico')->nullable();
            $table->longText('otra')->nullable();
            $table->integer('tipo_comite')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('acuerdos', function (Blueprint $table) {
            $table->index('id_oportunidad', 'my_id_oportunidad_acuerdos');
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
        Schema::dropIfExists('acuerdos');
    }
}
