<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesUsuario extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'rol_usuario';

    //primary key
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'id_user',
		'rol_id'
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
	public function rol(){
		return $this->hasOne('App\Roles', 'id', 'rol_id');
	}
}
