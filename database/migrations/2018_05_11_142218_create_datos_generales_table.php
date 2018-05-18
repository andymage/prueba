<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_generales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_oportunidad')->unsigned();
            $table->longText('grupo_economico')->nullable();
            $table->bigInteger('folio_bc')->nullable();
            $table->longText('localidad')->nullable();
            $table->date('fecha_constitucion')->nullable();
            $table->integer('tamano')->nullable();
            $table->longText('tenencia_accionaria')->nullable();
            $table->integer('calif_sector')->nullable();
            $table->integer('clave_actividad')->nullable();
            $table->longText('administracion')->nullable();
            $table->longText('puesto')->nullable();
            $table->longText('nombre_solicitante')->nullable();
            $table->integer('numero_empleados')->nullable();
            $table->longText('institucion_financiera')->nullable();
            $table->string('rfc')->nullable();
            $table->integer('clave_actividad_economica')->nullable();
            $table->integer('clave_programa')->nullable();
            $table->longText('condiciones_previas')->nullable();
            $table->longText('condiciones_consideraciones')->nullable();
            $table->date('fecha_responsabilidades')->nullable();
            $table->date('fecha_sugeridad_contrato')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('datos_generales', function (Blueprint $table) {
            $table->index('id_oportunidad', 'my_id_oportunidad_datos_generales');
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
        Schema::dropIfExists('datos_generales');
    }
}
