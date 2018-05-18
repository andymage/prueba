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

@endsection