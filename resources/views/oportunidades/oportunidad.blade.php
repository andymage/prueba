<?php

use App\Helper;

?>

@extends('layouts.app')

@section('content')

<?=
  	Helper::breadCrumbs([
    	['oportunidades/index', 'Lista de Oportunidades'],
    	['oportunidades/create', 'Nueva Oportunidad'],
  	])
?>

<div class="row">
	
	<div class="portlet light ">
		<div class="tabbable tabbable-tabdrop">
			@if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
			<div class="col-md-12 form-body">
		        <div class="portlet-title">
		            <div class="caption font-grey-salsa">
		                <i class="fa fa-pencil font-red"></i>
		                <span class="caption-subject font-red-thunderbird bold uppercase">Información de la Oportunidad</span>
		            </div>
		        </div>
			</div>
            {!! Form::open(
	            array(
	                'action' => 'OportunidadesController@saveOportunidades',
	                'class' => 'form',
	                'method' => 'POST',
	            )
	          ) !!}
	        {!! csrf_field() !!}
			<div class="portlet-body form">
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Nombre de la Oportunidad</label>
					<?=
	                    Form::text('Oportunidad[nombre]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Nombre del Cliente</label>
					<?=
                        Form::select('Oportunidad[id_prospecto]', $clientes,
                            $id_prospecto,
                            [
                                'class' => 'form-control js-example-basic-multiple',
	                            'readonly' => 'true'
                            ]
                        );
                    ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Aprobador</label>
					<?=
	                    Form::text('Oportunidad[aprobador]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Ingresos Extras</label>
					<?=
	                    Form::number('Oportunidad[ingresos]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
				
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Tipo de registro de la oportunidad</label>
						<?=
	                        Form::select('Oportunidad[tipo_registro]', $tipos_registro,
	                            $id_tipo_registro,
	                            [
	                                'class' => 'form-control js-example-basic-multiple',
	                                'readonly' => 'true'
	                            ]
	                        );
	                    ?>
		        </div>
		        <div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Etapa</label>
						<?=
	                        Form::select('Oportunidad[id_etapa]', $etapas,
	                            null,
	                            [
	                                'class' => 'form-control js-example-basic-multiple',
	                            ]
	                        );
	                    ?>
		        </div>
		        <div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Etapa Documentos</label>
						<?=
	                        Form::select('Oportunidad[id_etapa_documentos]', $etapas,
	                            null,
	                            [
	                                'class' => 'form-control js-example-basic-multiple',
	                            ]
	                        );
	                    ?>
		        </div>
		        <div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Fecha de Cierre</label>
					<div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
	                    <?=
		                    Form::text('Oportunidad[fecha_cierre]',
		                    	null,
		                    	[
		                        	'class' => 'form-control',
		                        	'readonly' => 'true'
		                    	]
		                	);
		                ?>
	                    <span class="input-group-btn">
	                        <button class="btn default" type="button">
	                            <i class="fa fa-calendar"></i>
	                        </button>
	                    </span>
	                </div>
		        </div>
		        <div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Probabilidad (%)</label>
					<?=
	                    Form::number('Oportunidad[probabilidad]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>

			</div>
			<div class="col-md-12 form-body">
		        <div class="portlet-title">
		            <div class="caption font-grey-salsa">
		                <i class="fa fa-money font-red"></i>
		                <span class="caption-subject font-red-thunderbird bold uppercase">Información de crédito</span>
		            </div>
		        </div>
			</div>
			<div class="portlet-body form">
		        <div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Tipo de crédito</label>
					<?=
	                    Form::select('Credito[tipo_credito]', $tipo_creditos,
	                        null,
	                        [
	                            'class' => 'form-control js-example-basic-multiple',
	                        ]
	                    );
	                ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Importe</label>
					<?=
	                    Form::number('Credito[importe]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Saldo Actual</label>
					<?=
	                    Form::number('Credito[saldo_actual]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Plazo Meses</label>
					<?=
	                    Form::number('Credito[plazo_meses]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Límite de Crédito</label>
					<?=
	                    Form::number('Credito[limite_credito]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Comisión por Apertura</label>
					<?=
	                    Form::number('Credito[comision_apertura]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Comisión por Estructuración</label>
					<?=
	                    Form::number('Credito[comision_estructuracion]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Tasa de Interés</label>
					<?=
	                    Form::number('Credito[tasa_interes]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>

			</div>
			<div class="col-md-12 form-body">
		        <div class="portlet-title">
		            <div class="caption font-grey-salsa">
		                <i class="fa fa-comment font-red"></i>
		                <span class="caption-subject font-red-thunderbird bold uppercase">Descripción</span>
		            </div>
		        </div>
			</div>
			<div class="portlet-body form">
				<div class="form-group col-md-4">
					<label class="control-label" for="oportunidad">Descripción</label>
					<?=
	                    Form::textArea('Descripcion[descripcion]',
	                    	null,
	                    	[
	                        	'class' => 'form-control'
	                    	]
	                	);
	                ?>
				</div>
			</div>
			<div class="form-group col-md-12">
			    {!! Form::submit('Guardar', 
			        array('class'=>'btn btn-danger'
			    )) !!}
			</div>
		</div>
		{!! Form::close() !!}
	</div>
</div>

@endsection