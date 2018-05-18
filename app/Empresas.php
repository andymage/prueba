<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'empresas_prospecto';

    //primary key(array)
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'id_user',
		'id_prospecto',
		'id_giro_mercantil',
		'id_tipo_empresa',
		'rfc',
		'anyos_constitucion',
		'numero_empleados',
		'ingresos_anuales',
		'sitio_web',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	/**
	 * @inheritdoc
	 */
	public function prospecto(){
		return $this->hasOne('App\Prospectos', 'id', 'id_prospecto');
	}

	/**
	 * @inheritdoc
	 */
	public function giroMercantil(){
		return $this->hasOne('App\GirosMercantiles', 'id', 'id_giro_mercantil');
	}

	/**
	 * @inheritdoc
	 */
	public function tipoEmpresa(){
		return $this->hasOne('App\TiposEmpresa', 'id', 'id_tipo_empresa');
	}
}
