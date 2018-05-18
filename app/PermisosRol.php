<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisosRol extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'permisos_rol';

    //primary key
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'rol_id',
		'permiso_id'
	];

	/**
	 * @inheritdoc
	 */
	public function rol(){
		return $this->hasOne('App\Roles', 'id', 'rol_id');
	}

	/**
	 * @inheritdoc
	 */
	public function permiso(){
		return $this->hasOne('App\Permisos', 'id', 'permiso_id');
	}
}
