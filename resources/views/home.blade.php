@extends('layouts.app')

@section('content')
@include('flash::message')

    <div class="card card-default">
        <div class="card-header">Bienvenido</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            Sistema
        </div>
    </div>
@endsection
