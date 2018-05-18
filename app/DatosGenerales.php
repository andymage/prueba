<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosGenerales extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

    protected $table = 'datos_generales';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_oportunidad',
		'grupo_economico',
		'folio_bc',
		'localidad',
		'fecha_constitucion',
		'tamano',
		'tenencia_accionaria',
		'calif_sector',
		'clave_actividad',
		'administracion',
		'puesto',
		'nombre_solicitante',
		'numero_empleados',
		'institucion_financiera',
		'rfc',
		'clave_actividad_economica',
		'clave_programa',
		'condiciones_previas',
		'condiciones_consideraciones',
		'fecha_responsabilidades',
		'fecha_sugeridad_contrato',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
