<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosProspecto extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'estados_prospecto';

    //primary key(array)
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'id_user',
		'nombre',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
