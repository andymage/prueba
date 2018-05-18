<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospectos extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	const MORAL  = 0;
	const FISICA = 1;

	public static $tipos_persona = [
		self::MORAL => 'PERSONA MORAL',
		self::FISICA => 'PERSONA FISICA',
	];

    
    //name table
    protected $table = 'prospectos';

    //primary key
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'id_user',
		'id_origen_prospecto',
		'id_estado_prospecto',
		'id_producto_interes',
		'id_prefijo',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'email',
		'nacionalidad',
		'tipo_persona',
		'id_etapa'
	];

	protected $appends = [
	    'nombreCompleto',
	    'persona'
	];

	public function getNombreCompletoAttribute(){
		return $this->apellido_paterno . ' ' . $this->apellido_materno . ' ' . $this->nombre;
	}

	public function getPersonaAttribute(){
		return self::$tipos_persona[$this->tipo_persona];
	}

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	/**
	 * @inheritdoc
	 */
	public function prefijo(){
		return $this->hasOne('App\Prefijos', 'id', 'id_user');
	}

	/**
	 * @inheritdoc
	 */
	public function origenProspecto(){
		return $this->hasOne('App\OrigenProspecto', 'id', 'id_origen_prospecto');
	}

	/**
	 * @inheritdoc
	 */
	public function estadoProspecto(){
		return $this->hasOne('App\EstadosProspecto', 'id', 'id_estado_prospecto');
	}

	/**
	 * @inheritdoc
	 */
	public function productosInteres(){
		return $this->hasOne('App\ProductosInteres', 'id', 'id_producto_interes');
	}

	/**
	 * @inheritdoc
	 */
	public function comentarios(){
		return $this->hasMany('App\Comentarios', 'id_prospecto', 'id');
	}

	/**
	 * @inheritdoc
	 */
	public function contactos(){
		return $this->hasMany('App\Contactos', 'id_prospecto', 'id');
	}

	/**
	 * @inheritdoc
	 */
	public function direcciones(){
		return $this->hasMany('App\Direcciones', 'id_prospecto', 'id');
	}

	/**
	 * @inheritdoc
	 */
	public function empresas(){
		return $this->hasMany('App\Empresas', 'id_prospecto', 'id');
	}

	/**
	 * @inheritdoc
	 */
	public function empresa(){
		return $this->hasOne('App\Empresas', 'id_prospecto', 'id');
	}


}
