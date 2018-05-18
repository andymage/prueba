<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

    protected $table = 'evaluaciones';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_oportunidad',
		'fecha_asignacion_expediente',
		'fecha_firma_estados_credito',
		'fecha_aprobacion_acta',
		'fecha_reunion',
		'opinion_valor',
		'analista',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
