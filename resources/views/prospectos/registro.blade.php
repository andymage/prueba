@extends('layouts.app')

@section('content')
            <div class="panel panel-danger">
                <div class="panel-heading">Registra tu Prospecto</div>
                {!! Form::open(
                    array(
                        'action' => 'ProspectosController@store', 
                        'class' => 'form',
                        'files' => true
                    )
                  ) !!}
                {!! csrf_field() !!}
                <div class="panel-body">
                    @if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
                        <div class="panel-group">
                            <div class="panel panel-warning">
                              <div class="panel-heading">Información del Prospecto</div>
                              <div class="panel-body">
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Tipo Persona</label>
                                    <?=
                                        Form::select('tipo_persona', $tipo_persona, 
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Producto de Interés</label>
                                    <?=
                                        Form::select('id_producto_interes', $productos, 
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Estado de Prospecto</label>
                                    <?=
                                        Form::select('id_estado_prospecto', $estados, 
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Nombre</label>
                                        <?=
                                            Form::text('nombre',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                        ?>
                                  </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Apellido Paterno</label>
                                        <?=
                                            Form::text('apellido_paterno',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Apellido Materno</label>
                                        <?=
                                            Form::text('apellido_materno',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Nacionalidad</label>
                                        <?=
                                            Form::text('nacionalidad',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Giro Mercantil</label>
                                        <?=
                                            Form::select('id_giro_mercantil', $giros, 
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">RFC de la Empresa</label>
                                        <?=
                                            Form::text('rfc',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Años de Constitución</label>
                                        <?=
                                            Form::number('anyos_constitucion',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Teléfono</label>
                                        <?=
                                            Form::number('telefono',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Extensión</label>
                                        <?=
                                            Form::number('ext',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">FAX</label>
                                        <?=
                                            Form::number('fax',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Celular</label>
                                        <?=
                                            Form::number('celular',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Email</label>
                                        <?=
                                            Form::email('email',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Sitio Web</label>
                                        <?=
                                            Form::text('sitio_web',
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                        ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputsm" class="col-md-12 control-label">Tratamiento</label>
                                    <?=
                                        Form::select('id_prefijo', $prefijos,
                                            null,
                                            [
                                                'class' => 'form-control input-sm'
                                            ]
                                        );
                                    ?>
                                </div>
                              </div>
                            </div>

                            <div class="panel panel-warning">
                                <div class="panel-heading">Información Dirección</div>
                                <div class="panel-body">
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Código Postal</label>
                                            <?=
                                                Form::number('codigo_postal',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                            ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Calle</label>
                                            <?=
                                                Form::text('calle',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                            ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Número</label>
                                            <?=
                                                Form::text('numero',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                            ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Colonia</label>
                                            <?=
                                                Form::text('colonia',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                            ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Delegación o Municipio</label>
                                            <?=
                                                Form::text('municipio',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                            ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Ciudad o Población</label>
                                            <?=
                                                Form::text('ciudad',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                            ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Entidad Federativa</label>
                                            <?=
                                                Form::text('entidad_federativa',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                            ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">País</label>
                                            <?=
                                                Form::text('pais',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-warning">
                                <div class="panel-heading">Información Adicional</div>
                                <div class="panel-body">
                                    <div class="form-group col-md-4">
                                       <label for="inputsm" class="col-md-12 control-label">Número de Empleados</label>
                                           <?=
                                               Form::number('numero_empleados',
                                               null,
                                               [
                                                   'class' => 'form-control input-sm'
                                               ]
                                           );
                                           ?>
                                   </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Ingresos Anuales</label>
                                            <?=
                                                Form::number('ingresos_anuales',
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                            ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Origen Prospecto</label>
                                        <?=
                                            Form::select('id_origen_prospecto', $origen, 
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputsm" class="col-md-12 control-label">Tipo Empresa</label>
                                        <?=
                                            Form::select('id_tipo_empresa', $tipo_empresa, 
                                                null,
                                                [
                                                    'class' => 'form-control input-sm'
                                                ]
                                            );
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-warning">
                                <div class="panel-heading">Descripción</div>
                                <div class="panel-body">
                                    <div class="form-group col-md-4">
                                       <label for="inputsm" class="col-md-12 control-label">Comentarios</label>
                                           <?=
                                               Form::textarea('comentario',
                                               null,
                                               [
                                                   'class' => 'form-control input-sm'
                                               ]
                                           );
                                           ?>
                                   </div>
                                </div>
                            </div>
                        </div>
                        
                        

                       
                        <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                {!! Form::submit('Crear', 
                                    array('class'=>'btn btn-primary'
                                )) !!}
                            </div>
                        </div>
                </div>
                {!! Form::close() !!}
            </div>

@endsection