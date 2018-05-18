<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'comentarios_prospecto';

    //primary key
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'id_user',
		'id_prospecto',
		'comentario',
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
