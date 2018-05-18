<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Prospectos;
use App\Prefijos;
use App\Empresas;
use App\Comentarios;
use App\Direcciones;
use App\Contactos;
use App\Helper;
use App\ProductosInteres;
use App\EstadosProspecto;
use App\GirosMercantiles;
use App\OrigenProspecto;
use App\TiposEmpresa;
use App\Http\Requests\ProspectoformRequest;
use App\Http\Requests\DireccionesRequest;
use Illuminate\Support\Facades\DB;
use App\Grids\ProspectosGrid;
use GuzzleHttp\Client;
use App\Http\Requests\TelefonosRequest;
use App\Http\Requests\ProspectosUpdateRequest;

class ProspectosController extends Controller
{
	/**
	 * Registro de prospectos
	 */
	public function registro(){
		$tipo_persona = Helper::select(Prospectos::$tipos_persona);
		$productos = ProductosInteres::pluck('nombre', 'id')->toArray();
		$productos = Helper::ArrayHelper($productos, 'id', 'nombre', 1);
		$estado = EstadosProspecto::pluck('nombre', 'id')->toArray();
		$estado = Helper::ArrayHelper($estado, 'id', 'nombre', 1);
		$giros = GirosMercantiles::pluck('nombre', 'id')->toArray();
		$giros = Helper::ArrayHelper($giros, 'id', 'nombre', 1);
		$origen = OrigenProspecto::pluck('nombre', 'id')->toArray();
		$origen = Helper::ArrayHelper($origen, 'id', 'nombre', 1);
		$tipo_empresa = TiposEmpresa::pluck('nombre', 'id')->toArray();
		$tipo_empresa = Helper::ArrayHelper($tipo_empresa, 'id', 'nombre', 1);
		$prefijos = Prefijos::pluck('nombre', 'id')->toArray();
		$prefijos = Helper::ArrayHelper($prefijos, 'id', 'nombre', 1);
		return view('prospectos.registro',[
			'tipo_persona' => $tipo_persona,
			'tipo_empresa' => $tipo_empresa,
			'productos' => $productos,
			'prefijos' => $prefijos,
			'estados' => $estado,
			'origen' => $origen,
			'giros' => $giros,
		]);
	}

	public function store(ProspectoformRequest $request){
		try {
			DB::beginTransaction();
			$array = array_merge($request->all(), [
				'id_user' => $request->user()->id
			]);
			$model = Prospectos::create($array);
			$array = array_merge($array, [
				'id_prospecto' => $model->id
			]);
			$empresa = Empresas::create($array);
			$direcciones = Direcciones::create($array);
			if (!empty($request->get('telefono'))) {
				$telefono = New Contactos;
				$telefono->id_user = $request->user()->id;
				$telefono->id_prospecto = $model->id;
				$telefono->numero = $request->get('telefono');
				$telefono->extension = $request->get('ext');
				$telefono->tipo = Contactos::LOCAL;
				$telefono->save();
			}
			if (!empty($request->get('fax'))) {
				$fax = New Contactos;
				$fax->id_user = $request->user()->id;
				$fax->id_prospecto = $model->id;
				$fax->numero = $request->get('fax');
				$fax->tipo = Contactos::FAX;
				$fax->save();
			}
			if (!empty($request->get('fax'))) {
				$celular = New Contactos;
				$celular->id_user = $request->user()->id;
				$celular->id_prospecto = $model->id;
				$celular->numero = $request->get('celular');
				$celular->tipo = Contactos::CELULAR;
				$celular->save();
			}
			if (!empty($request->get('comentario'))) {
				$comentarios = New Comentarios;
				$comentarios->id_user = $request->user()->id;
				$comentarios->id_prospecto = $model->id;
				$comentarios->comentario = $request->get('comentario');
				$comentarios->save();
			}
			DB::commit();
	        flash('¡Creado Correctamente!')->success();
			return redirect('users/index/');
		} catch (Exception $e) {
			DB::rollBack();
			abort(500);
		}
	}

	public function view($id){
		$model = $this->findModel($id);
		return view('prospectos.view',[
			'model' => $model
		]);
	}

	public function index(Request $request){
		return (new ProspectosGrid())
		    ->create([
		        'query' => Prospectos::query(),
		        'request' => $request
		    ])
		    ->renderOn('prospectos.index');
	}

	public function update($id){
		$model = $this->findModel($id);
		$tipo_persona = Helper::select(Prospectos::$tipos_persona);
		$productos = ProductosInteres::pluck('nombre', 'id')->toArray();
		$productos = Helper::ArrayHelper($productos, 'id', 'nombre', 1);
		$estado = EstadosProspecto::pluck('nombre', 'id')->toArray();
		$estado = Helper::ArrayHelper($estado, 'id', 'nombre', 1);
		$giros = GirosMercantiles::pluck('nombre', 'id')->toArray();
		$giros = Helper::ArrayHelper($giros, 'id', 'nombre', 1);
		$origen = OrigenProspecto::pluck('nombre', 'id')->toArray();
		$origen = Helper::ArrayHelper($origen, 'id', 'nombre', 1);
		$tipo_empresa = TiposEmpresa::pluck('nombre', 'id')->toArray();
		$tipo_empresa = Helper::ArrayHelper($tipo_empresa, 'id', 'nombre', 1);
		$prefijos = Prefijos::pluck('nombre', 'id')->toArray();
		$tipo_telefonos = Contactos::$tipos;
		$tipo_telefonos = Helper::ArrayHelper($tipo_telefonos, 'id', 'nombre', 1);
		return view('prospectos.update',[
			'tipo_telefonos' => $tipo_telefonos,
			'tipo_persona' => $tipo_persona,
			'tipo_empresa' => $tipo_empresa,
			'productos' => $productos,
			'prefijos' => $prefijos,
			'estados' => $estado,
			'origen' => $origen,
			'giros' => $giros,
			'model' => $model,
		]);
	}

	/**
	 * Finds the Empresas model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Empresas the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Prospectos::find($id)) !== null) {
			return $model;
		} else {
			abort(404);
		}
	}

	public function comentarios($id, Request $request) {
		$model = New Comentarios;
		$model->id_user = $request->user()->id;
		$model->id_prospecto = $id;
		$model->comentario = $request->get('comentario');
		if ($model->save()) {
        	flash('!Creado con éxito!')->success();
			return redirect('prospectos/update/' . $id);
		}
        flash('¡Ocurrió un error!')->error();
		return redirect('prospectos/update/' . $id);
	}

	public function direccion($id, Request $request) {
		$array = $request->all() + [
			'id_prospecto' => $id,
			'id_user' => $request->user()->id
		];
		$model = Direcciones::create($array);
		flash('!Creado con éxito!')->success();
		return redirect('prospectos/update/' . $id);
	}

	public function codigoPostal(Request $request){
		$cp = $request->get('codigo_postal');
		$cuenta = strlen($cp);
		if ($cuenta == 5) {
			$client = new Client();
			try {
	            $request = $client->get(env('API_CP') . $cp ,[]);
	            $response = json_decode($request->getBody());
	            
	            if (empty($response)) {
	                return [
	                	'error' => 'CP no existe o es incorrecto'
	                ];
	            }
	            $municipio = $response[0]->D_mnpio;
	            $estado = $response[0]->d_estado;
	            $colonia = [];
	            foreach ($response as $key => $value) {
	            	$colonia[$value->d_asenta] = $value->d_asenta;
	            }
	            return [
	            	'estado' => $estado,
	            	'municipio' => $municipio,
	            	'colonia' => $colonia
	            ];
	        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
	            return [
	            	'error' => 'Ocurrió un error con la conexión vuelva a intentarlo'
	            ];
	        }
		}
		return [
        	'error' => 'CP no existe o es incorrecto'
        ];
	}

	public function contactos($id, Request $request){
		$array = [
			'id_user' => $request->user()->id,
			'id_prospecto' => $id
		] + $request->all();
		$model = Contactos::create($array);
		flash('!Creado con éxito!')->success();
		return redirect('prospectos/update/' . $id);
	}

	public function direccionesUpdate($id, DireccionesRequest $request){
		$array = $request->all();
		unset($array['_token']);
		$i = 0;
		$arreglo = [];
		foreach ($array as $key => $value) {
			foreach ($value as $key2 => $value2) {
				$arreglo[$key2][$key] = $value2;
			}
			$i++;
		}
		try {
			DB::beginTransaction();
			foreach ($arreglo as $key => $value) {
				$model = Direcciones::find($value['id']);
				$model->calle = $value['calle'];
				$model->numero = $value['numero'];
				$model->codigo_postal = $value['codigo_postal'];
				$model->colonia = $value['colonia'];
				$model->municipio = $value['municipio'];
				$model->ciudad = $value['ciudad'];
				$model->pais = $value['pais'];
				$model->entidad_federativa = $value['entidad_federativa'];
				$model->save();
			}
			DB::commit();
			flash('!Actualizado con éxito!')->success();
			return redirect('prospectos/update/' . $id);
		} catch (Exception $e) {
			DB::rollBack();
			flash('!Ocurrió un error!')->error();
			return redirect('prospectos/update/' . $id);
		}
	}

	public function telefonosUpdate($id, TelefonosRequest $request){
		$array = $request->all();
		unset($array['_token']);
		$i = 0;
		$arreglo = [];
		foreach ($array as $key => $value) {
			foreach ($value as $key2 => $value2) {
				$arreglo[$key2][$key] = $value2;
			}
			$i++;
		}
		try {
			DB::beginTransaction();
			foreach ($arreglo as $key => $value) {
				$model = Contactos::find($value['id']);
				$model->numero = $value['numero'];
				$model->extension = $value['extension'];
				$model->tipo = $value['tipo'];
				$model->save();
			}
			DB::commit();
			flash('!Actualizado con éxito!')->success();
			return redirect('prospectos/update/' . $id);
		} catch (Exception $e) {
			DB::rollBack();
			flash('!Ocurrió un error!')->error();
			return redirect('prospectos/update/' . $id);
		}
	}

	public function prospectosUpdate($id, ProspectosUpdateRequest $request){
		try {
			DB::beginTransaction();
			$model = Prospectos::find($id);
			$model->id_origen_prospecto = $request->get('id_origen_prospecto');
			$model->id_estado_prospecto = $request->get('id_estado_prospecto');
			$model->id_producto_interes = $request->get('id_producto_interes');
			$model->nombre = $request->get('nombre');
			$model->apellido_paterno = $request->get('apellido_paterno');
			$model->apellido_materno = $request->get('apellido_materno');
			$model->email = $request->get('email');
			$model->nacionalidad = $request->get('nacionalidad');
			$model->id_prefijo = $request->get('id_prefijo');
			$model->tipo_persona = $request->get('tipo_persona');
			$model->save();
			DB::commit();
			flash('!Actualizado con éxito!')->success();
			return redirect('prospectos/update/' . $id);
		} catch (Exception $e) {
			DB::rollBack();
			flash('!Ocurrió un error!')->error();
			return redirect('prospectos/update/' . $id);
		}
	}

	public function cambioEtapa($id, Request $request){
		$model = Prospectos::find($id);
		$model->id_etapa = $request->get('id_etapa_siguiente');
		$model->save();
		flash('!Cambio de etapa exitoso!')->success();
		return redirect('home');
	}

}
