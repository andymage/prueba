<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

    protected $table = 'indicadores';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_oportunidad',
		'pre_calificacion',
		'reserva_ponderadas_monto',
		'capital_monto',
		'raroc',
		'rorac',
		'ventas_anuales',
		'reserva_ponderas_porcentaje',
		'capital_porcentaje',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
