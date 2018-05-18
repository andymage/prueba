<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acuerdos extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

    protected $table = 'acuerdos';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_oportunidad',
		'fecha_acuerdo',
		'tipo_alta_credito',
		'art_73',
		'sector_economico',
		'otra',
		'tipo_comite',
		'id_user',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
