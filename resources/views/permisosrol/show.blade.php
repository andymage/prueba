<?php

use App\Helper;

?>
@extends('layouts.app')

@section('content')

<?=
  Helper::breadCrumbs([
    ['permisosrol/index', 'Lista de Permisos a Rol'],
  ])
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Permiso: <b><?= $model->permiso->permiso ?></b> Rol: <b><?= $model->rol->rol ?></b></div>
				@include('flash::message')
				<table class="table">
				  	<thead>
				    	<tr>
				      		<th scope="col">id</th>
				      		<td scope="row"><?= $model->id ?></td>
				    	</tr>
				  	</thead>
				  	<tbody>
				    	<tr>
				      		<th scope="row">Permiso</th>
				      		<td><?= $model->permiso->permiso ?></td>
				    	</tr>
				    	<tr>
				      		<th scope="row">Rol</th>
				      		<td><?= $model->rol->rol ?></td>
				    	</tr>
				    	<tr>
				      		<th scope="row">Fecha Alta</th>
				      		<td><?= $model->fecha_alta ?></td>
				    	</tr>
				    	<tr>
				      		<th scope="row">Fecha Actualización</th>
				      		<td><?= $model->fecha_actualizacion ?></td>
				    	</tr>
				  	</tbody>
				</table>
            </div>
        </div>
    </div>
</div>

@endsection
