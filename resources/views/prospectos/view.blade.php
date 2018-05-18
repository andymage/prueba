<?php

use App\Helper;

?>
@extends('layouts.app')

@section('content')

<?=
  Helper::breadCrumbs([
    ['prospectos/index', 'Lista de Prospectos'],
    ['prospectos/view/' . $model->id, 'Prospecto: ' . $model->nombreCompleto]
  ])
?>
<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-user font-blue-ebonyclay"></i>
            <span class="caption-subject font-blue-ebonyclay bold uppercase">Prospecto: <?= $model->nombreCompleto ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <ul class="nav nav-tabs">
            <li class="active">
                <a class="font-red bold" href="#tab_1_1" data-toggle="tab" aria-expanded="true"><i class="fa fa-user "></i> Prospecto</a>
            </li>
            <li class="">
                <a class="font-blue bold" href="#tab_1_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-phone "></i> Contacto </a>
            </li>
            <li class="">
                <a class="font-purple bold" href="#tab_1_3" data-toggle="tab" aria-expanded="false"><i class="fa fa-map "></i> Dirección </a>
            </li>
            <li class="">
                <a class="font-yellow-mint bold" href="#tab_1_4" data-toggle="tab" aria-expanded="false"><i class="fa fa-building "></i> Empresa </a>
            </li>
            <li class="">
                <a class="font-yellow-gold bold" href="#tab_1_5" data-toggle="tab" aria-expanded="false"><i class="fa fa-comment "></i> Descripción </a>
            </li>
        </ul>
        <div id="pjax-siniestro-update" class="portlet box" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000">
            <div class="tab-content">
                <div class="tab-pane active in" id="tab_1_1">
                	<table class="table table-striped table-bordered table-hover">
						<tbody>
							<tr>
								<td class="active font-blue-ebonyclay text-center bold"> Nombre </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->nombreCompleto ?></td>
								<td class="active font-blue-ebonyclay text-center bold"> Tipo Persona </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->persona ?></td>
							</tr>
							<tr>
								<td class="active font-blue-ebonyclay text-center bold"> Estado Prospecto </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->estadoProspecto->nombre ?></td>
								<td class="active font-blue-ebonyclay text-center bold"> Origen Prospecto </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->origenProspecto->nombre ?></td>
							</tr>
							<tr>
								<td class="active font-blue-ebonyclay text-center bold"> E-mail </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->email ?></td>
								<td class="active font-blue-ebonyclay text-center bold"> Tratamiento </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->prefijo->nombre ?></td>
							</tr>
							<tr>
								<td class="active font-blue-ebonyclay text-center bold"> Producto Interés </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->productosInteres->nombre ?></td>
								<td class="active font-blue-ebonyclay text-center bold"> Nacionalidad </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->nacionalidad ?></td>
							</tr>
						</tbody>
					</table>
                </div>
                <div class="tab-pane" id="tab_1_2">
                	<table class="table table-striped table-bordered table-hover">
                		<thead>
                			<td class="active font-blue-ebonyclay text-center bold" width="10%"> # </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="50%"> Número </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="20%"> Extensión </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="20%"> Tipo </td>
                		</thead>
                		<?php
                			$i = 1;
                			foreach ($model->contactos as $key => $value) {
                				echo 
                					'<tr>',
										'<td class="font-blue-ebonyclay text-center">' . $i . '</td>',
										'<td class="font-blue-ebonyclay text-center">' . $value->numero . '</td>',
										'<td class="font-blue-ebonyclay text-center">' . $value->extension . '</td>',
										'<td class="font-blue-ebonyclay text-center">' . $value->tipoTelefono . '</td>',
									'</tr>';
                				$i++;
                			}
                		?>
					</table>
                </div>
                <div class="tab-pane" id="tab_1_3">
                	<table class="table table-striped table-bordered table-hover">
                		<thead>
                			<td class="active font-blue-ebonyclay text-center bold" width="5%"> # </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="20%"> Calle </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="10%"> Número </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="10%"> Código Postal </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="20%"> Colonia </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="20%"> Municipio/Delegación </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="15%"> Ciudad </td>
                		</thead>
                	<?php
                			$i = 1;
                			foreach ($model->direcciones as $key => $value) {
                				echo 
                					'<tr>',
										'<td class="font-blue-ebonyclay text-center">' . $i . '</td>',
										'<td class="font-blue-ebonyclay text-center">' . $value->calle . '</td>',
										'<td class="font-blue-ebonyclay text-center">' . $value->numero . '</td>',
										'<td class="font-blue-ebonyclay text-center">' . $value->codigo_postal . '</td>',
										'<td class="font-blue-ebonyclay text-center">' . $value->colonia . '</td>',
										'<td class="font-blue-ebonyclay text-center">' . $value->municipio . '</td>',
										'<td class="font-blue-ebonyclay text-center">' . $value->ciudad . '</td>',
									'</tr>';
                				$i++;
                			}
                	?>
                	</table>
                </div>
                <div class="tab-pane" id="tab_1_4">
                	<table class="table table-striped table-bordered table-hover">
						<tbody>
							<tr>
								<td class="active font-blue-ebonyclay text-center bold"> Giro Mercantil </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->empresa->giroMercantil->nombre ?></td>
								<td class="active font-blue-ebonyclay text-center bold"> RFC de la Empresa </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->empresa->rfc ?></td>
							</tr>
							<tr>
								<td class="active font-blue-ebonyclay text-center bold"> Años de Constitución </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->empresa->anyos_constitucion ?></td>
								<td class="active font-blue-ebonyclay text-center bold"> Número de Empleados </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->empresa->numero_empleados ?></td>
							</tr>
							<tr>
								<td class="active font-blue-ebonyclay text-center bold"> Ingresos Anuales </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->empresa->ingresos_anuales ?></td>
								<td class="active font-blue-ebonyclay text-center bold"> Sitio Web </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->empresa->sitio_web ?></td>
							</tr>
							<tr>
								<td class="active font-blue-ebonyclay text-center bold"> Tipo Empresa </td>
								<td class="font-blue-ebonyclay text-center"><?= $model->empresa->tipoEmpresa->nombre ?></td>
							</tr>
						</tbody>
					</table>
                </div>
                <div class="tab-pane" id="tab_1_5">
                	<table class="table table-striped table-bordered table-hover">
                		<thead>
                			<td class="active font-blue-ebonyclay text-center bold" width="5%"> # </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="20%"> Comentario </td>
                			<td class="active font-blue-ebonyclay text-center bold" width="10%"> Usuario </td>
                		</thead>
						<tbody>
							<?php
								$i = 1;
                                foreach ($model->comentarios as $key => $value) {
                                    echo '
                                        <tr>
                                            <td class="font-blue-ebonyclay text-center" width="10%">' . $i . '</td>
                                            <td class="font-blue-ebonyclay text-center" width="70%">' . $value->comentario . '</td>
                                            <td class="font-blue-ebonyclay text-center" width="20%">' . $value->user->name . '</td>
                                        </tr>
                                    ';
                                    $i++;
                                }
							?>
						</tbody>
					</table>
                </div>
            </div>
        </div>
        <?= Helper::formEtapas($model->id, $model->id_etapa) ?>
    </div>
</div>
@endsection
