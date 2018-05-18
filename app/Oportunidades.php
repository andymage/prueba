<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oportunidades extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	const OPORTUNIDAD 				= 1;
	const PERSONA_FÍSICA_APROBADA 	= 2;
	const PERSONA_FÍSICA_EVALUACIÓN = 3;
	const PERSONA_MORAL_APROBADA 	= 4;
	const PERSONA_MORAL_EVALUACIÓN 	= 5;
	const PROMOTOR_PERSONA_FÍSICA 	= 6;
	const PROMOTOR_PERSONA_MORAL 	= 7;

    protected $table = 'oportunidades';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_prospecto',
		'tipo_registro',
		'nombre',
		'nombre_cliente',
		'aprobador',
		'ingresos',
		'tipo',
		'id_etapa',
		'id_etapa_documentos',
		'estatus_credito',
		'probabilidad',
		'numero_cuenta',
		'campaña',
		'osag',
		'ran3',
		'ran4',	
		'tipo_persona',
		'fecha_cierre',
		'id_user'
	];

	public static $tipo_registros = [
		self::OPORTUNIDAD => 'OPORTUNIDAD',
		self::PERSONA_FÍSICA_APROBADA => 'PERSONA FÍSICA APROBADA',
		self::PERSONA_FÍSICA_EVALUACIÓN => 'PERSONA FÍSICA EVALUACIÓN',
		self::PERSONA_MORAL_APROBADA => 'PERSONA MORAL APROBADA',
		self::PERSONA_MORAL_EVALUACIÓN => 'PERSONA MORAL EVALUACIÓN',
		self::PROMOTOR_PERSONA_FÍSICA => 'PROMOTOR PERSONA FÍSICA',
		self::PROMOTOR_PERSONA_MORAL => 'PROMOTOR PERSONA MORAL',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
