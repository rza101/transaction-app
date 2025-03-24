@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <a href="{{ route('transactions.create') }}" class="btn bg-sky-500">
        Create Transaction
    </a>
@stop
