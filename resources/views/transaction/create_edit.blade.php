@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create / Edit Transaction</h1>
@stop

@section('content')
    <form action={{ route('transactions.store') }} method="POST">
        @csrf

        <div class="flex">
            <div class="flex flex-row-6">
                Customer
            </div>
            <div class="flex flex-row-6">
                <select name="customer_id">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                    <option>
                    </option>
                </select>
            </div>
        </div>

        <div class="flex">
            <div class="flex-row">
                Started at
            </div>
            <div class="flex-row">
                <input type="datetime-local" name="started_at">
            </div>
        </div>

        <div class="flex">
            <div class="flex-row">
                Ended at
            </div>
            <div class="flex-row">
                <input type="datetime-local" name="ended_at">
            </div>
        </div>
        
        <div class="flex">
            <div class="flex-row">
                Ended at
            </div>
            <div class="flex-row">
                <input type="datetime-local" name="ended_at">
            </div>
        </div>
    </form>
@stop
