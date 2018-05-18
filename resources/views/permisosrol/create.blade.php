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
                <div class="panel-heading">Crear Permiso a Rol</div>
                {!! Form::open(
                    array(
                        'action' => 'PermisosRolController@store', 
                        'class' => 'form',
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
                            <label for="inputsm" class="col-md-4 control-label">Permiso</label>
                            <?=
                                Form::select('permiso_id', $permisos, 
                                null,
                                [
                                    'class' => 'form-control select2exa',
                                ]
                            );
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-4 control-label">Rol</label>
                            <?=
                                Form::select('rol_id', $roles, 
                                null,
                                [
                                    'class' => 'form-control select2exa',
                                ]
                            );
                            ?>
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
    </div>
</div>

@stop

@section('javascript')
    <script type="text/javascript">
        $('.select2exa').select2();
    </script>
@stop