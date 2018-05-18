<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descripciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_oportunidad')->unsigned();
            $table->longText('descripcion')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('descripciones', function (Blueprint $table) {
            $table->index('id_oportunidad', 'my_id_oportunidad_descripciones');
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
        Schema::dropIfExists('descripciones');
    }
}
