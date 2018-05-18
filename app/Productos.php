<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
	const CREATED_AT = 'fecha_alta';

	const UPDATED_AT = 'fecha_actualizacion';
    
    //name table
    protected $table = 'productos';

    //primary key
    protected $primaryKey = 'idProducto';

    // Atributos que se pueden asignar de manera masiva.
	protected $fillable = [
		'usuario_id',
		'Marcas_idMarca',
		'familia',
		'version',
		'modelo',
		'descripcion',
		'imagen',
		'codMapfre',
		'codQualitas',
		'estatus',
		'codGNP',
	];

	public static $campos_admin = [
		'idProducto',
		'marcas_no.marca',
		'version',
		'modelo',
		'descripcion',
		'codMapfre'	,
		'codQualitas',
		'codGNP',
		'familias.familia'
	];

	public static $campos_admin_valida = [
		'id',
		'marca',
		'version',
		'modelo',
		'descripcion',
		'codmapfre'	,
		'codqualitas',
		'codgnp',
		'familia'
	];

	public static $campos_aseguradora_maestra = [
		'id',
		'marca',
		'version',
		'modelo',
		'descripcion',
		'familia',
	];

	public static $campos_aseguradora = [
		'id',
	];

	public static $campos = [
		'idProducto',
		'marca',
		'version',
		'modelo',
		'descripcion',
		'familia',
	];

	public static $campos_grid = [
		'idProducto',
		'marca',
		'version',
		'modelo',
		'descripcion',
		'familia',
	];

	public static $campos_select = [
		'idProducto',
		'marcas_no.marca as marca',
		'version',
		'modelo',
		'descripcion',
		'familias.familia as familia',
		'codGNP',
		'codQualitas',
		'codMapfre',
	];

	public static $campos_query = [
		'idProducto' => 'idProducto',
		'marca' => 'marcas_no.marca',
		'version' => 'productos.version',
		'modelo' => 'productos.modelo',
		'descripcion' => 'productos.descripcion',
		'familia' => 'familias.familia',
		'codGNP' => 'codGNP',
		'codMapfre' => 'codMapfre',
		'codQualitas' => 'codQualitas',
	];

	public static $campos_aseguradoras_query = [
		'codGNP',
		'codQualitas',
		'codMapfre',
	];

	public static $label = [
		'codGNP' => 'Código GNP',
		'codQualitas' => 'Código QUALITAS',
		'codMapfre' => 'Código MAPFRE',
	];

	/**
	 * @inheritdoc
	 */
	public function user(){
		return $this->hasOne('App\User', 'id', 'usuario_id');
	}

	/**
	 * @inheritdoc
	 */
	public function marcas(){
		return $this->hasOne('App\Marcas', 'idMarca', 'Marcas_idMarca');
	}

	/**
	 * @inheritdoc
	 */
	public function familias(){
		return $this->hasOne('App\Familias', 'idFamilia', 'familia');
	}

	public static function grid(){
		$get = self::getArray();
		$array = [];
		foreach ($get as $key => $value) {
			$array[$value] = [
				'label' => strtoupper($value),
				"search" => [
				    "enabled" => true
				],
				"filter" => [
				    "enabled" => true,
				    "operator" => "="
				]
			];
		}
		//dd($array);die();
		return $array;
	}

	public static function getArray($valida = NULL){
		$user = \Auth::user();
		$campos = [];
		if ($user->hasRol('admin')) {
			$campos = self::$campos_grid + self::$campos_aseguradoras_query;
			if (!empty($valida)) {
				$campos = self::$campos_select + self::$campos_aseguradoras_query;
			}
		}
        else {
			$aseguradora = $user->aseguradorasUsuario;
			$campos = self::$campos_grid;
			if (!empty($valida)) {
				$campos = self::$campos_select;
			}
			foreach ($aseguradora as $key => $value) {
				$campos[] = $value->aseguradora->columna;
			}
        }
        return $campos;
	}


	public static function getLabel($string){
		$array = self::$label;
		if (empty($string)) {
			return '';
		}
		return $array[$string];
	}

}
