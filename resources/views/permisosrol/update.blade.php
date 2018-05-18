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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Modificar Permiso</div>
                {!! Form::open(
                    array(
                        'action' => ['PermisosController@edit', $model->id], 
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
                             <?=
                                Form::text('id',
                                $model->id,
                                [
                                    'class' => 'form-control input-sm hidden'
                                ]
                            );
                            ?>
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-4 control-label">Rol</label>
                             <?=
                                Form::text('permiso',
                                $model->permiso,
                                [
                                    'class' => 'form-control input-sm'
                                ]
                            );
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-4 control-label">Descripción</label>
                             <?=
                                Form::text('descripcion',
                                $model->descripcion,
                                [
                                    'class' => 'form-control input-sm'
                                ]
                            );
                            ?>
                        </div>
                        <div class="form-group col-md-12">
                            {!! Form::submit('Actualizar', 
                                array('class'=>'btn btn-primary'
                            )) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection