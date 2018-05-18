<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'permisos';

    //primary key
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'permiso',
		'descripcion'
	];


	/**
	 * @inheritdoc
	 */
	public function permisosRol(){
		return $this->hasMany('App\PermisosRol', 'permiso_id', 'id');
	}

	/**
	 * @inheritdoc
	 */
	protected static function boot() {
        parent::boot();

        static::deleting(function($model) { // before delete() method call this
             $model->permisosRol()->delete();
        });
    }
}
