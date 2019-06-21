@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if (session('message'))
    <div class="alert alert-warning">
        {{ session('error-message') }}
    </div>
    @endif

    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
@stop
