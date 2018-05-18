<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkbox', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('nombre');
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('checkbox', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_checkbox');
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
        Schema::table('checkbox', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropIndex('my_id_user_checkbox');
            $table->dropColumn('id_user');
        });
        Schema::dropIfExists('checkbox');
    }
}
