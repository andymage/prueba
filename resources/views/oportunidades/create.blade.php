<?php

use App\Helper;

?>
@extends('layouts.app')

@section('content')
	<?=
	  	Helper::breadCrumbs([
	    	['oportunidades/index', 'Lista de Oportunidades'],
	  	])
	?>
	<div class="portlet light ">
	    <div class="portlet-title">
	        <div class="caption font-red-sunglo">
	            <i class="icon-pencil font-red-sunglo"></i>
	            <span class="caption-subject bold uppercase"> Selecciona Tipo de Oportunidad</span>
	        </div>
	        
	    </div>
	    <div class="portlet-body form">
	        {!! Form::open(
	            array(
	                'action' => 'OportunidadesController@avanza',
	                'class' => 'form',
	                'files' => true,
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
	                <div class="form-group col-md-6">
	                    <label for="select2-button-addons-single-input-group-sm" class="control-label">Tipo Nuevo Registro</label>
	                    <?=
	                        Form::select('tipo_registro', $tipo_registro,
	                            null,
	                            [
	                                'class' => 'form-control js-example-basic-multiple input-sm'
	                            ]
	                        );
	                    ?>
	                </div>
	                <div class="form-group col-md-6">
	                    <label for="select2-button-addons-single-input-group-sm" class="control-label">Nombre Cliente</label>
	                    <?=
	                        Form::select('id_prospecto', $clientes,
	                            null,
	                            [
	                                'class' => 'form-control js-example-basic-multiple input-sm'
	                            ]
	                        );
	                    ?>
	                </div>
	                <div class="form-group col-md-12">
	                    {!! Form::submit('Siguiente', 
	                        array('class'=>'btn btn-primary'
	                    )) !!}
	                </div>
	            </div>
	        {!! Form::close() !!}
	    </div>
	</div>
@stop

@section('javascript')
	<script type="text/javascript">
        $(document).ready(function() {
          	$('.js-example-basic-multiple').select2();
        });
    </script>
@stop