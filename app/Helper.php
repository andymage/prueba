<?php

namespace App;

use App\EtapasAvanza;

class Helper
{

	const CABECERA = '<div class="page-bar"><ul class="page-breadcrumb">';
	const CABECERA_FIN = '</ul></div>';
	const APERTURA = '<li>';
	const CIERRE = '</li>';

	/**
	 * Generación de breadcrumbs
	 * @param array
	 * @return html|string
	 */
	public static function ArrayHelper($array, $keys, $keys1, $band = 0){
		$armado = [];
		if ($band == 1) {
			$armado = [NULL => 'Seleccione'];
		}
		/*foreach ($array as $key) {
			$armado[$key[$keys]] = $key[$keys1];
		}*/
		$armado = $armado + $array;
		return $armado;
	}

	/**
	 * Generación de select2
	 * @param array
	 * @return html|string
	 */
	public static function ArrayHelperSelect($array){
		if (is_array($array)) {
			return [NULL => 'Seleccione'] + $array;
		}
		return $array;
	}

	/**
	 * Agrega archivo a carpeta especificada
	 */
	public static function uploadFile($file, $folder, $name){
      	$file->move($folder, $name);
	}

	public static function select($array){
		$array = [
			NULL => 'Seleccione'
		] + $array;
		return $array;
	}

	public static function getQuery($array, $headers = []) {
		$response = [];
		foreach ($array as $key => $value) {
			if (!empty($value)) {
				if ($key != 'page' and $key != 'export') {
					if (!empty($headers)) {
						$response[] = [$headers[$key], 'like', '%' . $value . '%'];
					}
					else{
						$response[] = [$key, 'like', '%' . $value . '%'];
					}
				}
			}
		}
		return $response;
	}

	/**
	 * Generación de breadcrumbs
	 * @param array
	 * @return html|string
	 */
	public static function breadCrumbs($array){
		$crumbs = self::CABECERA . '<li>
            <i class="icon-home"></i>
            <a href="' . url('home') . '">Inicio</a>
            <i class="fa fa-angle-right"></i>
        </li>';
        $cuenta = count($array);
        $i = 1;
		foreach ($array as $key => $value) {
			$crumbs .= self::APERTURA ;
			$action = \Html::link($value[0], $value[1]);
			$crumbs .=  $action;
			$crumbs .= self::CIERRE;
			if ($i != $cuenta) {
				$crumbs .= ' <i class="fa fa-angle-right"></i> ';
			}
			$i++;
		}
		$crumbs .= self::CABECERA_FIN;
		return $crumbs;
	}

	public static function formEtapas($id, $id_etapa){
		$model = EtapasAvanza::where('id_etapa', '=', $id_etapa)->get();
		$html = \Form::open(
            [
                'action' => ['ProspectosController@cambioEtapa', $id], 
                'class' => 'form',
                'id' => 'prospectosupdate'
            ]
        );

		if (count($model) == 1) {
			$html.= \Form::text('id_etapa_siguiente',
                $model->id_etapa_siguiente,
                [
                    'class' => 'form-control hidden'
                ]
            );
			$html .= '<button type="submit" class="btn btn-danger mt-ladda-btn ladda-button btn-outline" data-style="slide-right" data-spinner-color="#333">
	            <span class="ladda-label">
	            	Avanzar a ' . $model->etapaSiguiente->nombre . ' <i class="fa fa-mail-forward"></i>
	         	</span>
	        	<span class="ladda-spinner"></span>
	        </button>' . \Form::close();
		}
		else if (count($model) > 1){
			$array = [
				null => 'Seleccione'
			];
			foreach ($model as $key => $value) {
				$array[$value->id_etapa_siguiente] = $value->etapaSiguiente->nombre;
			}
			$html .= '
				<div class="row">
                    <div class="col-md-4">' . 
                		\Form::select('id_etapa_siguiente', $array,
            				null,
            				[
                				'class' => 'form-control',
                				'required' => 'true',
            				]
        				) .'
        			</div>
        		</div>
        		<br>
				<div class="row">
				<div class="col-md-4">
        		<button type="submit" class="btn btn-danger mt-ladda-btn ladda-button btn-outline" data-style="slide-right" data-spinner-color="#333">
	            <span class="ladda-label">
	            	Avanzar <i class="fa fa-mail-forward"></i>
	         	</span>
	        	<span class="ladda-spinner"></span>
	        </button></div></div>' . \Form::close();
		}
		else{
			return '';
		}
        return $html;
	}
}