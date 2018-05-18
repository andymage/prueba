<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersActualizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oportunidades', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->index('id_user', 'my_id_user_oportunidades');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('creditos', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->index('id_user', 'my_id_user_creditos');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('descripciones', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->index('id_user', 'my_id_user_descripciones');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('garantias', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->index('id_user', 'my_id_user_garantias');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('adicionales', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->index('id_user', 'my_id_user_adicionales');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('acuerdos', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->index('id_user', 'my_id_user_acuerdos');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('evaluaciones', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->index('id_user', 'my_id_user_evaluaciones');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('datos_generales', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->index('id_user', 'my_id_user_datos_generales');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('indicadores', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->index('id_user', 'my_id_user_indicadores');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oportunidades', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_oportunidades');
            $table->dropColumn('id_user');
        });

        Schema::table('creditos', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_creditos');
            $table->dropColumn('id_user');
        });

        Schema::table('descripciones', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_descripciones');
            $table->dropColumn('id_user');
        });

        Schema::table('garantias', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_garantias');
            $table->dropColumn('id_user');
        });

        Schema::table('adicionales', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_adicionales');
            $table->dropColumn('id_user');
        });

        Schema::table('acuerdos', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_acuerdos');
            $table->dropColumn('id_user');
        });

        Schema::table('evaluaciones', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_evaluaciones');
            $table->dropColumn('id_user');
        });

        Schema::table('datos_generales', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_datos_generales');
            $table->dropColumn('id_user');
        });

        Schema::table('indicadores', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_indicadores');
            $table->dropColumn('id_user');
        });
    }
}
