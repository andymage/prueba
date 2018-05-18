<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creditos extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	const CREDITO_CUENTA_CORRIENTE 			= 1;
	const APERTURA_CREDITO_SIMPLE 			= 2;
	const APERTURA_CREDITO_SIMPLE_VEHICULOS = 3;
	const FACTORAJE_PROVEEDORES 			= 4;
	const CADENAS_PRODUCTIVAS 				= 5;

    protected $table = 'creditos';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_oportunidad',
		'tipo_credito',
		'importe',
		'saldo_actual',
		'plazo_meses',
		'limite_credito',
		'tasa_interes',
		'tasa_moratoria',
		'tasa_ordinaria',
		'comision_apertura',
		'comision_estructuracion',
		'periodicidad_pago',
		'destino',
		'forma_disposicion',
		'forma_pago_intereses',
		'forma_pago_capital',
		'id_user'
	];

	public static $tipo_creditos = [
		self::CREDITO_CUENTA_CORRIENTE => 'Crédito en cuenta corriente',
		self::APERTURA_CREDITO_SIMPLE => 'Apertura de crédito simple',
		self::APERTURA_CREDITO_SIMPLE_VEHICULOS => 'Apertura de crédito simple para adquisión de vehículos',
		self::FACTORAJE_PROVEEDORES => 'Factoraje a proveedores',
		self::CADENAS_PRODUCTIVAS => 'Cadenas productivas',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
