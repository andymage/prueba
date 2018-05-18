<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'direcciones_prospecto';

    //primary key(array)
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'id_user',
		'id_prospecto',
		'calle',
		'numero',
		'colonia',
		'codigo_postal',
		'municipio',
		'ciudad',
		'pais',
		'entidad_federativa',
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
}
