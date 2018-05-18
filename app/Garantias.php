<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garantias extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

    protected $table = 'garantias';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_oportunidad',
		'id_user',
		'garantia',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
