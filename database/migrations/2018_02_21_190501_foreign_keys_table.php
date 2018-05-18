<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prefijos', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_prefijos_users');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('giros_mercantiles', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_giros_mercantiles_users');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('productos_interes', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_productos_interes_users');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('origen_prospecto', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_origen_prospecto_users');
            $table->foreign('id_user')->references('id')->on('users');
        });
        
        Schema::table('estados_prospecto', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_estados_prospecto_users');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('tipos_empresa', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_tipos_empresa_users');
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('direcciones_prospectos', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_direcciones_prospectos_users');
            $table->foreign('id_user')->references('id')->on('users');

            $table->index('id_prospecto', 'my_id_prospecto_direcciones_prospectos_prospectos');
            $table->foreign('id_prospecto')->references('id')->on('prospectos');
        });

        Schema::table('contactos_prospecto', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_contactos_prospecto_users');
            $table->foreign('id_user')->references('id')->on('users');

            $table->index('id_prospecto', 'my_id_prospecto_contactos_prospecto_prospectos');
            $table->foreign('id_prospecto')->references('id')->on('prospectos');
        });

        Schema::table('empresas_prospecto', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_empresas_prospecto_users');
            $table->foreign('id_user')->references('id')->on('users');

            $table->index('id_prospecto', 'my_id_prospecto_empresas_prospecto_prospectos');
            $table->foreign('id_prospecto')->references('id')->on('prospectos');

            $table->index('id_giro_mercantil', 'my_id_giro_mercantil_empresas_prospecto_giros');
            $table->foreign('id_giro_mercantil')->references('id')->on('giros_mercantiles');

            $table->index('id_tipo_empresa', 'my_id_tipo_empresa_empresas_prospecto_tipo');
            $table->foreign('id_tipo_empresa')->references('id')->on('tipos_empresa');
        });

        Schema::table('prospectos', function (Blueprint $table) {
            $table->index('id_user', 'my_id_user_prospectoss_users');
            $table->foreign('id_user')->references('id')->on('users');

            $table->index('id_origen_prospecto', 'my_id_origen_prospecto_prospectoss_prospectos');
            $table->foreign('id_origen_prospecto')->references('id')->on('origen_prospecto');

            $table->index('id_estado_prospecto', 'my_id_estado_prospecto_prospectos_giros');
            $table->foreign('id_estado_prospecto')->references('id')->on('estados_prospecto');

            $table->index('id_producto_interes', 'my_id_producto_interes_prospectos_tipo');
            $table->foreign('id_producto_interes')->references('id')->on('productos_interes');
        });

        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('prefijos', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_prefijos_users');
        });

        Schema::table('giros_mercantiles', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_giros_mercantiles_users');
        });

        Schema::table('productos_interes', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_productos_interes_users');
        });

        Schema::table('origen_prospecto', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_origen_prospecto_users');
        });
        
        Schema::table('estados_prospecto', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_estados_prospecto_users');
        });

        Schema::table('tipos_empresa', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_tipos_empresa_users');
        });

        Schema::table('direcciones_prospectos', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_direcciones_prospectos_users');

            $table->dropForeign('id_prospecto');
            $table->dropIndex('id_prospecto', 'my_id_prospecto_direcciones_prospectos_prospectos');
        });

        Schema::table('contactos_prospecto', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_contactos_prospecto_users');

            $table->dropForeign('id_prospecto');
            $table->dropIndex('id_prospecto', 'my_id_prospecto_contactos_prospecto_prospectos');
        });

        Schema::table('empresas_prospecto', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_empresas_prospecto_users');

            $table->dropForeign('id_prospecto');
            $table->dropIndex('id_prospecto', 'my_id_prospecto_empresas_prospecto_prospectos');

            $table->dropForeign('id_giro_mercantil');
            $table->dropIndex('id_giro_mercantil', 'my_id_giro_mercantil_empresas_prospecto_giros');

            $table->dropForeign('id_tipo_empresa');
            $table->dropIndex('id_tipo_empresa', 'my_id_tipo_empresa_empresas_prospecto_tipo');
        });

        Schema::table('prospectos', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropIndex('id_user', 'my_id_user_prospectoss_users');

            $table->dropForeign('id_origen_prospecto');
            $table->dropIndex('id_origen_prospecto', 'my_id_origen_prospecto_prospectoss_prospectos');

            $table->dropForeign('id_estado_prospecto');
            $table->dropIndex('id_estado_prospecto', 'my_id_estado_prospecto_prospectos_giros');

            $table->dropForeign('id_producto_interes');
            $table->dropIndex('id_producto_interes', 'my_id_producto_interes_prospectos_tipo');
        });
    }
}
