<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('rol_id')->unsigned();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
        });

        Schema::table('rol_usuario', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_rol_usuario');
            $table->foreign('id_user')->references('id')->on('users');

            $table->index('rol_id', 'my_rol_id_rol_usuario');
            $table->foreign('rol_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_usuario');
    }
}
