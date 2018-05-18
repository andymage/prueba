<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'roles';

    //primary key
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'rol',
		'descripcion'
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
	public function permisosRol(){
		return $this->hasMany('App\PermisosRol', 'rol_id', 'id');
	}

	/**
	 * @inheritdoc
	 */
	public function rolUsuarios(){
		return $this->hasMany('App\RolesUsuario', 'rol_id', 'id');
	}

	/**
	 * @inheritdoc
	 */
	protected static function boot() {
        parent::boot();

        static::deleting(function($model) { // before delete() method call this
             $model->permisosRol()->delete();
             $model->rolUsuarios()->delete();
        });
    }
}
