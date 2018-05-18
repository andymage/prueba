<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasProspectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_prospecto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_prospecto')->unsigned();
            $table->integer('id_giro_mercantil')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('id_tipo_empresa')->unsigned();
            $table->string('rfc')->nullable();
            $table->integer('anyos_constitucion')->nullable();
            $table->integer('numero_empleados')->nullable();
            $table->bigInteger('ingresos_anuales')->nullable();
            $table->string('sitio_web')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas_prospecto');
    }
}
