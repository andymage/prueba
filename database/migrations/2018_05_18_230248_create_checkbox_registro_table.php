<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckboxRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkbox_registro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_checkbox')->unsigned();
            $table->integer('id_registro');
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('checkbox_registro', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_checkbox_registro');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('checkbox_registro', function (Blueprint $table) {
            $table->index('id_checkbox', 'my_id_checkbox_checkbox_registro');
            $table->foreign('id_checkbox')->references('id')->on('checkbox');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkbox_registro', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_checkbox_registro');
            $table->dropColumn('id_user');
        });

        Schema::table('checkbox_registro', function (Blueprint $table) {
            $table->dropForeign(['id_checkbox']);
            $table->dropIndex('my_id_checkbox_checkbox_registro');
            $table->dropColumn('id_checkbox');
        });
        Schema::dropIfExists('checkbox_registro');
    }
}
