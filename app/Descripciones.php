<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descripciones extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

    protected $table = 'descripciones';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_oportunidad',
		'id_user',
		'descripcion',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
