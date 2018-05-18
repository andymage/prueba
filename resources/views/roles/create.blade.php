@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Rol</div>
                {!! Form::open(
                    array(
                        'action' => 'RolesController@store', 
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
                        <div class="form-group col-md-6">
                            <label for="inputsm" class="col-md-4 control-label">Rol</label>
                             <?=
                                Form::text('rol',
                                null,
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
                                null,
                                [
                                    'class' => 'form-control input-sm'
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

@endsection