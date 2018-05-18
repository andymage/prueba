@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                	{!! $grid !!}
            </div>
        </div>
    </div>
</div>

@endsection