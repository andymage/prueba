<?php

use App\Helper;

?>
@extends('layouts.app')

@section('content')
<?=
  Helper::breadCrumbs([
    ['users/index', 'Lista de Usuarios'],
  ])
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar Usuario</div>
                {!! Form::open(
                    array(
                        'action' => ['UsersController@edit', $model->id], 
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
                         <?=
                            Form::text('id',
                                $model->id,
                                [
                                    'class' => 'form-control input-sm hidden'
                                ]
                            );
                        ?>
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-6 control-label">Nombre</label>
                             <?=
                                Form::text('name',
                                    $model->name,
                                    [
                                        'class' => 'form-control input-sm'
                                    ]
                                );
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-6 control-label">Email</label>
                             <?=
                                Form::email('email',
                                    $model->email,
                                    [
                                        'class' => 'form-control input-sm'
                                    ]
                                );
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-6 control-label">Rol</label>
                            <?=
                                Form::select('rol_id', $roles, 
                                    $model->rol->rol->id,
                                    [
                                        'class' => 'form-control select2exa',
                                    ]
                                );
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-6 control-label">Usuario</label>
                             <?=
                                Form::text('username',
                                    $model->username,
                                    [
                                        'class' => 'form-control input-sm',
                                        'disabled' => 'disabled'
                                    ]
                                );
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-6 control-label">Contraseña</label>
                             <?=
                                Form::password('password',
                                    [
                                        'class' => 'form-control',
                                    ]
                                );
                            ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-6 control-label">Confirmar Contraseña</label>
                             <?=
                                Form::password('c_password',
                                    [
                                        'class' => 'form-control',
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