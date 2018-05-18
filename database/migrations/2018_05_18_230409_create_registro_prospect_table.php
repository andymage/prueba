<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroProspectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_prospecto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_prospecto')->unsigned();
            $table->integer('id_registro')->unsigned();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('registro_prospecto', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_registro_prospecto');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('registro_prospecto', function (Blueprint $table) {
            $table->index('id_prospecto', 'my_id_prospecto_registro_prospecto');
            $table->foreign('id_prospecto')->references('id')->on('prospectos');
        });

        Schema::table('registro_prospecto', function (Blueprint $table) {
            $table->index('id_registro', 'my_id_registro_registro_prospecto');
            $table->foreign('id_registro')->references('id')->on('checkbox_registro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registro_prospecto', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_registro_prospecto');
            $table->dropColumn('id_user');
        });

        Schema::table('registro_prospecto', function (Blueprint $table) {
            $table->dropForeign(['id_prospecto']);
            $table->dropIndex('my_id_prospecto_registro_prospecto');
            $table->dropColumn('id_prospecto');
        });

        Schema::table('registro_prospecto', function (Blueprint $table) {
            $table->dropForeign(['id_registro']);
            $table->dropIndex('my_id_registro_registro_prospecto');
            $table->dropColumn('id_registro');
        });

        Schema::dropIfExists('registro_prospecto');
    }
}
