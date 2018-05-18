<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
	const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';
    
    const FAX = 0;
    const LOCAL = 1;
    const CELULAR = 2;

    public static $tipos = [
    	self::FAX => 'FAX',
		self::LOCAL => 'LOCAL',
		self::CELULAR => 'CELULAR',
    ];

    //name table
    protected $table = 'contactos_prospecto';

    //primary key(array)
    protected $primaryKey = 'id';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'id_user',
		'id_prospecto',
		'numero',
		'extension',
		'tipo'
	];
	
	protected $appends = [
	    'tipoTelefono',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	/**
	 * @inheritdoc
	 */
	public function prospecto(){
		return $this->hasOne('App\Prospectos', 'id', 'id_prospecto');
	}

	public function getTipoTelefonoAttribute(){
		return self::$tipos[$this->tipo];
	}
}
