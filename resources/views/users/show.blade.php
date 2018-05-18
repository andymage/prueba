<?php

use App\Helper;

?>
@extends('layouts.app')

@section('content')

<?=
  Helper::breadCrumbs([
    ['roles/index', 'Lista de Roles'],
  ])
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Nombre de Usuario: <b><?= $model->username ?></b></div>
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
				      		<th scope="row">Nombre</th>
				      		<td><?= $model->name ?></td>
				    	</tr>
				    	<tr>
				      		<th scope="row">Nombre de Usuario</th>
				      		<td><?= $model->username ?></td>
				    	</tr>
				    	<tr>
				      		<th scope="row">E-mail</th>
				      		<td><?= $model->email ?></td>
				    	</tr>
				    	<tr>
				      		<th scope="row">Rol</th>
				      		<td><?php
				      			foreach ($model->roles as $key => $value) {
				      				echo $value->rol->rol;
				      			}
				      		?></td>
				    	</tr>
				  	</tbody>
				</table>
            </div>
        </div>
    </div>
</div>

@endsection
