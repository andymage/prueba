<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_oportunidad')->unsigned();
            $table->integer('tipo_credito')->nullable();
            $table->bigInteger('importe')->nullable();
            $table->bigInteger('saldo_actual')->nullable();
            $table->integer('plazo_meses')->nullable();
            $table->bigInteger('limite_credito')->nullable();
            $table->bigInteger('tasa_interes')->nullable();
            $table->bigInteger('tasa_moratoria')->nullable();
            $table->bigInteger('tasa_ordinaria')->nullable();
            $table->bigInteger('comision_apertura')->nullable();
            $table->bigInteger('comision_estructuracion')->nullable();
            $table->bigInteger('periodicidad_pago')->nullable();
            $table->longText('destino')->nullable();
            $table->longText('forma_disposicion')->nullable();
            $table->longText('forma_pago_intereses')->nullable();
            $table->longText('forma_pago_capital')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('creditos', function (Blueprint $table) {
            $table->index('id_oportunidad', 'my_id_oportunidad_oportunidades');
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
        Schema::dropIfExists('creditos');
    }
}
