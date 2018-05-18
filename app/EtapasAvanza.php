<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EtapasAvanza extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'etapas_avanza';

    //primary key(array)
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'id_user',
		'id_etapa',
		'id_etapa_siguiente'
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
	public function etapa(){
		return $this->hasOne('App\Etapas', 'id', 'id_etapa');
	}

	/**
	 * @inheritdoc
	 */
	public function etapaSiguiente(){
		return $this->hasOne('App\Etapas', 'id', 'id_etapa_siguiente');
	}

}
