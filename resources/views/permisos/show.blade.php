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
<div class="panel panel-default">
    <div class="panel-heading">Permiso: <b><?= $model->permiso ?></b></div>
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
	      		<td><?= $model->permiso ?></td>
	    	</tr>
	    	<tr>
	      		<th scope="row">Descripción</th>
	      		<td><?= $model->descripcion ?></td>
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
@endsection
