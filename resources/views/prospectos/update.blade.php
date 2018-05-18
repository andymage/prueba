<?php

use App\Helper;

?>

@include('vendor.lrgt.ajax_script', [
    'form' => '#myform',
    'request' => 'App/Http/Requests/DireccionesRequest',
    'on_start' => true
])

@extends('layouts.app')

@section('content')

<?=
  Helper::breadCrumbs([
    ['prospectos/index', 'Lista de Prospectos'],
    ['prospectos/update/' . $model->id, 'Prospecto: ' . $model->nombreCompleto],
  ])
?>

@include('flash::message')

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
                        {!! Form::open(
                            array(
                                'action' => ['ProspectosController@prospectosUpdate', $model->id], 
                                'class' => 'form',
                                'id' => 'prospectosupdate'
                            )
                            ) 
                        !!}
                            @if (count($errors->prospecto) > 0)   
                                <?php
                                ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->prospecto->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="row">
                            <div class="col-md-4">
                               <div class="form-group">
                                   <label class="control-label font-dark">Tipo Persona</label>
                                   <?=
                                       Form::select('tipo_persona', $tipo_persona, 
                                           $model->tipo_persona,
                                           [
                                               'class' => 'form-control '
                                           ]
                                       );
                                   ?>
                               </div>
                            </div>
                           <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label class="control-label font-dark">Producto de Interés</label>
                                   <?=
                                       Form::select('id_producto_interes', $productos, 
                                           $model->id_producto_interes,
                                           [
                                               'class' => 'form-control '
                                           ]
                                       );
                                   ?>
                                </div>
                            </div>
                           <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label class="control-label font-dark">Estado de Prospecto</label>
                                   <?=
                                        Form::select('id_estado_prospecto', $estados, 
                                            $model->id_estado_prospecto,
                                            [
                                                'class' => 'form-control '
                                            ]
                                        );
                                   ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Origen Prospecto</label>
                                    <?=
                                        Form::select('id_origen_prospecto', $origen, 
                                            $model->id_origen_prospecto,
                                            [
                                                'class' => 'form-control'
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Email</label>
                                    <?=
                                        Form::email('email',
                                        $model->email,
                                        [
                                            'class' => 'form-control'
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Tratamiento</label>
                                    <?=
                                        Form::select('id_prefijo', $prefijos,
                                            $model->id_prefijo,
                                            [
                                                'class' => 'form-control'
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                           <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Nombre</label>
                                    <?=
                                        Form::text('nombre',
                                            $model->nombre,
                                            [
                                                'class' => 'form-control '
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                           <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Apellido Paterno</label>
                                    <?=
                                        Form::text('apellido_paterno',
                                            $model->apellido_paterno,
                                            [
                                                'class' => 'form-control '
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                           <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Apellido Materno</label>
                                    <?=
                                        Form::text('apellido_materno',
                                            $model->apellido_materno,
                                            [
                                                'class' => 'form-control '
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Nacionalidad</label>
                                    <?=
                                        Form::text('nacionalidad',
                                        $model->nacionalidad,
                                        [
                                            'class' => 'form-control '
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                           <!--/span-->
                       </div>
                           <button type="submit" class="btn red">Guardar</button>

                       {!! Form::close() !!}
                    </div>
                    <div class="tab-pane" id="tab_1_2">
                        <a class="btn blue btn-outline sbold" data-toggle="modal" href="#telephone"><i class="fa fa-plus"></i> Nuevo Contacto </a>
                        {!! Form::open(
                            array(
                                'action' => ['ProspectosController@telefonosUpdate', $model->id], 
                                'class' => 'form',
                                'id' => 'telefonosupdate'
                            )
                            ) 
                        !!}
                            @if (count($errors->telefonos) > 0)   
                                <?php
                                ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->telefonos->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="row">
                            <?php
                                $i = 1;
                                foreach ($model->contactos as $key => $value) {
                                    echo '<br><div class="caption font-red-sunglo">
                                        <i class="fa fa-phone font-blue"></i>
                                        <span class="caption-subject font-blue bold uppercase">Contacto ' . $i . '</span>
                                    </div>';
                                    $i++;
                                    echo Form::text('id[]',
                                        $value->id,
                                        [
                                            'class' => 'form-control  hidden'
                                        ]
                                    ) .'
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label font-dark">Número Telefónico</label>' .
                                                Form::number('numero[]',
                                                    $value->numero,
                                                    [
                                                        'class' => 'form-control '
                                                    ]
                                                ) .
                                        '</div>
                                    </div>
                                     <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label font-dark">Extensión</label>' .
                                                Form::number('extension[]',
                                                    $value->extension,
                                                    [
                                                        'class' => 'form-control '
                                                    ]
                                                ) .
                                        '</div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label font-dark">Tipo</label>' .
                                                Form::select('tipo[]', $tipo_telefonos,
                                                    $value->tipo,
                                                    [
                                                        'class' => 'form-control '
                                                    ]
                                                ) .
                                        '</div>
                                    </div>';
                                }
                            ?>
                        </div>
                            <button type="submit" class="btn red">Guardar</button>

                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade" id="tab_1_3">
                        <div align="left">
                            <a class="btn purple btn-outline sbold" data-toggle="modal" href="#direccion"><i class="fa fa-plus"></i> Nueva Dirección </a>
                        </div>
                            {!! Form::open(
                                array(
                                    'action' => ['ProspectosController@direccionesUpdate', $model->id], 
                                    'class' => 'form',
                                    'id' => 'direccionesupdate'
                                )
                                ) 
                            !!}
                                @if (count($errors->direcciones) > 0)   
                                    <?php
                                    ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->direcciones->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <?php
                                $i = 1;
                                foreach ($model->direcciones as $key => $value) {
                                    echo '<div class="row"><br><div class="caption font-red-sunglo">
                                        <i class="icon-map font-purple"></i>
                                        <span class="caption-subject font-purple bold uppercase">Dirección ' . $i . '</span>
                                    </div>';
                                    $i++;
                                    echo Form::text('id[]',
                                                $value->id,
                                                [
                                                    'class' => 'form-control hidden'
                                                ]
                                            ) . '
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label font-dark">Calle</label>' .
                                            Form::text('calle[]',
                                                $value->calle,
                                                [
                                                    'class' => 'form-control'
                                                ]
                                            ) .
                                        '</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label font-dark">Número</label>' .
                                            Form::text('numero[]',
                                                $value->numero,
                                                [
                                                    'class' => 'form-control '
                                                ]
                                            ) .
                                        '</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label font-dark">Código Postal</label>' .
                                            Form::number('codigo_postal[]',
                                            $value->codigo_postal,
                                            [
                                                'class' => 'form-control',
                                                'onchange' => 'codigoPostal("' . $i . '")',
                                                'id' => 'codigo_postal_' . $i
                                            ]
                                            ) .
                                        '</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label font-dark">Colonia</label>' .
                                            
                                            Form::select('colonia[]', [$value->colonia => $value->colonia], 
                                                $value->colonia,
                                                [
                                                    'class' => 'form-control ',
                                                    'id' => 'colonia_' . $i,
                                                    'required' => 'true',
                                                ]
                                            ) .
                                        '</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label font-dark">Municipio/Delegación</label>' .
                                            Form::text('municipio[]',
                                                $value->municipio,
                                                [
                                                    'class' => 'form-control',
                                                    'id' => 'municipio_' . $i
                                                ]
                                            ) .
                                        '</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label font-dark">Ciudad</label>' .
                                            Form::text('ciudad[]',
                                                $value->ciudad,
                                                [
                                                    'class' => 'form-control',
                                                    'id' => 'ciudad_' . $i
                                                ]
                                            ) .
                                        '</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label font-dark">País</label>' .
                                            Form::text('pais[]',
                                                $value->pais,
                                                [
                                                    'class' => 'form-control'
                                                ]
                                            ) .
                                        '</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label font-dark">Entidad Federativa</label>' .
                                            Form::text('entidad_federativa[]',
                                                $value->entidad_federativa,
                                                [
                                                    'class' => 'form-control',
                                                    'id' => 'entidad_federativa_' . $i
                                                ]
                                            ) .
                                        '</div>
                                    </div>
                                </div>
                                    ';
                                }

                            ?>
                                <button type="submit" class="btn red">Guardar</button>

                            {!! Form::close() !!}   
                    </div>
                    <div class="tab-pane fade" id="tab_1_4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Giro Mercantil</label>
                                    <?=
                                        Form::select('id_giro_mercantil', $giros, 
                                        $model->empresa->id_giro_mercantil,
                                            [
                                                'class' => 'form-control '
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">RFC de la empresa</label>
                                    <?=
                                        Form::text('rfc',
                                        $model->empresa->rfc,
                                        [
                                            'class' => 'form-control '
                                        ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Años Constitución</label>
                                    <?=
                                        Form::number('anyos_constitucion',
                                        $model->empresa->anyos_constitucion,
                                        [
                                            'class' => 'form-control '
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Número de Empleados</label>
                                    <?=
                                        Form::number('numero_empleados',
                                        $model->empresa->numero_empleados,
                                        [
                                            'class' => 'form-control '
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Ingresos Anuales</label>
                                    <?=
                                        Form::number('ingresos_anuales',
                                        $model->empresa->ingresos_anuales,
                                        [
                                            'class' => 'form-control '
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Sitio Web</label>
                                    <?=
                                        Form::text('sitio_web',
                                        $model->empresa->sitio_web,
                                        [
                                            'class' => 'form-control '
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label font-dark">Tipo Empresa</label>
                                    <?=
                                        Form::select('id_tipo_empresa', $tipo_empresa, 
                                            $model->empresa->id_tipo_empresa,
                                            [
                                                'class' => 'form-control '
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab_1_5">
                        <a class="btn yellow-gold btn-outline sbold" data-toggle="modal" href="#responsive"><i class="fa fa-plus"></i> Nuevo Comentario </a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Comentario </th>
                                        <th> Usuario </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        foreach ($model->comentarios as $key => $value) {
                                            echo '
                                                <tr>
                                                    <td width="10%">' . $i . '</td>
                                                    <td width="70%">' . $value->comentario . '</td>
                                                    <td width="20%">' . $value->user->name . '</td>
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
        </div>

    </div>
</div>
<div id="telephone" class="modal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(
                array(
                    'action' => ['ProspectosController@contactos', $model->id], 
                    'class' => 'form',
                )
                ) 
            !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Crear Contacto</h4>
            </div>
            <div class="modal-body">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                        <div class="row">
                            <div class="col-md-6">
                                    <label class="control-label font-dark">Número Telefónico</label>
                                    <?= Form::number('numero',
                                        null,
                                        [
                                            'class' => 'form-control ',
                                            'required' => 'true'
                                        ]
                                    ) ?>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                        <label class="control-label font-dark">Extensión</label>
                                        <?= Form::number('extension',
                                            null,
                                            [
                                                'class' => 'form-control '
                                            ]
                                        ) ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                        <label class="control-label font-dark">Tipo</label>
                                        <?= Form::select('tipo', $tipo_telefonos,
                                            null,
                                            [
                                                'class' => 'form-control ',
                                                'required' => 'true'
                                            ]
                                        ) ?>
                                </div>
                            </div>
                        </div>

                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancelar</button>
                <button type="submit" class="btn red">Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div id="responsive" class="modal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(
                array(
                    'action' => ['ProspectosController@comentarios', $model->id], 
                    'class' => 'form',
                )
                ) 
            !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Crear Comentario</h4>
            </div>
            <div class="modal-body">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;"><div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                        <div class="row">
                            <div class="col-md-6">
                            <label>Comentario:</label>
                                <?=
                                    Form::textarea('comentario',
                                    null,
                                    [
                                        'class' => 'form-control ',
                                        'required' => 'required'
                                    ]
                                );
                                ?>
                            </div>
                            
                        </div>

                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancelar</button>
                <button type="submit" class="btn red">Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<div id="direccion" class="modal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(
                array(
                    'action' => ['ProspectosController@direccion', $model->id], 
                    'class' => 'form novalidate',
                )
                ) 
            !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Crear Dirección</h4>
            </div>
            <div class="modal-body">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
                    <div class="scroller" style="height: 300px; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                        <div id="div_cp" class="custom-alerts alert alert-danger fade in hidden"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><p id="error_cp"></p></div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Código Postal</label>
                                <?=
                                    Form::number('codigo_postal',
                                        null,
                                        [
                                            'class' => 'form-control',
                                            'required' => 'true',
                                            'onchange' => 'codigoPostal("' . $i . '")',
                                            'id' => 'codigo_postal_' . $i
                                        ]
                                    );
                                ?>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Colonia</label>
                                    <?=
                                        Form::select('colonia', [], 
                                            null,
                                            [
                                                'class' => 'form-control ',
                                                'id' => 'colonia_' . $i,
                                                'required' => 'true',
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Calle</label>
                                    <?=
                                        Form::text('calle',
                                            null,
                                            [
                                                'class' => 'form-control ',
                                                'required' => 'true',
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Número</label>
                                    <?=
                                        Form::text('numero',
                                            null,
                                            [
                                                'class' => 'form-control ',
                                                'required' => 'true',
                                            ]
                                        );
                                    ?>                                                           
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Municipio/Delegación</label>
                                    <?=
                                        Form::text('municipio',
                                            null,
                                            [
                                                'class' => 'form-control ',
                                                'id' => 'municipio_' . $i,
                                                'required' => 'true',
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Ciudad</label>
                                    <?=
                                        Form::text('ciudad',
                                            null,
                                            [
                                                'class' => 'form-control ',
                                                'id' => 'ciudad_' . $i,
                                                'required' => 'true',
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>Entidad Federativa</label>
                                    <?=
                                        Form::text('entidad_federativa',
                                            null,
                                            [
                                                'class' => 'form-control ',
                                                'id' => 'entidad_federativa',
                                                'required' => 'true',
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>País</label>
                                    <?=
                                        Form::text('pais',
                                            null,
                                            [
                                                'class' => 'form-control '
                                            ]
                                        );
                                    ?>
                                </div>
                            </div>
                        </div>

                </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancelar</button>
                <button type="submit" class="btn red">Guardar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('javascript')
    <script type="text/javascript">
        function codigoPostal(id){
            $("#colonia_" + id).find('option').remove().end();
            $("#colonia_" + id).append('<option value="">Seleccione</option>');
            data = '';
            codigo_postal = $('#codigo_postal_' + id).val();
            //if (codigo_postal.length == 5) {
                $.ajax({
                    url:  '<?= url('prospectos/codigopostal') ?>',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'codigo_postal': codigo_postal,
                    },
                    success: function (data) {
                        $('#municipio_' + id).val(data.municipio);
                        $('#ciudad_' + id).val(data.estado);
                        $('#entidad_federativa_' + id).val(data.estado);
                        if (data.error != undefined) {
                            $('#div_cp').removeClass('hidden');
                            $('#error_cp').text(data.error);
                        }
                        else{
                            $('#div_cp').addClass('hidden');
                            $.each(data.colonia, function( key2, value2 ) {
                                $("#colonia_" + id).append('<option value='+value2+'>'+value2+'</option>');
                            });
                        }
                    }
                });
                
            //}
        }
    </script>
@stop