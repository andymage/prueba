<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adicionales extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

    protected $table = 'adicionales';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_oportunidad',
		'origen_prospecto',
		'paso_siguiente',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
