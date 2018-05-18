<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrefijoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prospectos', function (Blueprint $table) {
            $table->integer('id_prefijo')->unsigned();
            $table->index('id_prefijo', 'my_id_prefijo_prefijos_prospectos');
            $table->foreign('id_prefijo')->references('id')->on('prefijos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prospectos', function (Blueprint $table) {
            $table->dropForeign('id_prefijo');
            $table->dropIndex('id_prefijo', 'my_id_prefijo_prefijos_prospectos');
            $table->dropColumn('id_prefijo');
        });
    }
}
