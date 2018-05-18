<?php

use App\Helper;

?>
@extends('layouts.app')

@section('content')
<?=
  Helper::breadCrumbs([
    ['permisos/index', 'Lista de Permisos'],
  ])
?>
<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-pencil font-red-sunglo"></i>
            <span class="caption-subject bold uppercase"> Crear Permiso</span>
        </div>
        
    </div>
    <div class="portlet-body form">
        {!! Form::open(
            array(
                'action' => 'PermisosController@store', 
                'class' => 'form',
                'files' => true,
                'role' => 'form'
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
                <div class="form-group form-md-line-input has-info col-md-6">
                     <?=
                        Form::text('permiso',
                        null,
                        [
                            'class' => 'form-control input-sm'
                        ]
                    );
                    ?>
                    <label for="form_control_1">Permiso</label>
                </div>
                <div class="form-group form-md-line-input has-info col-md-6">
                     <?=
                        Form::text('descripcion',
                        null,
                        [
                            'class' => 'form-control input-sm'
                        ]
                    );
                    ?>
                    <label for="form_control_1">Descripción</label>
                </div>
                <div class="form-group col-md-12">
                    {!! Form::submit('Crear', 
                        array('class'=>'btn btn-primary'
                    )) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection