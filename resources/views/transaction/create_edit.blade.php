@extends('adminlte::page')

@section('title', 'Dashboard')

@php
    $isEdit = isset($transaction);
@endphp

@section('content_header')
    <h1>{{ $isEdit ? 'Edit' : 'Create' }} Transaction</h1>
@stop

@section('content')
    <form action={{ $isEdit ? route('transactions.update', $transaction) : route('transactions.store') }} method="POST">
        @csrf

        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="form-group row mb-4">
            <label for="customer_id" class="col-2 col-form-label">Customer</label>
            <select name="customer_id" id="customer_id" class="col custom-select">
                <option value="" selected>Please select customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" @selected($isEdit && $customer->id == $transaction->customer_id)>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group row mb-4">
            <label for="fleet_id" class="col-2 col-form-label">Fleet</label>
            <select name="fleet_id" id="fleet_id" class="col custom-select">
                <option value="" selected>Please select fleet</option>
                @foreach ($fleets as $fleet)
                    <option value="{{ $fleet->id }}" @selected($isEdit && $fleet->id == $transaction->fleet_id)>
                        {{ $fleet->license_number }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group row mb-4">
            <label class="col-2 col-form-label">Started at</label>
            <input type="date" name="started_at" id="started_at" class="col form-control"
                value="{{ old('started_at', $isEdit ? date('Y-m-d', strtotime($transaction->started_at)) : '') }}">
        </div>

        <div class="form-group row mb-4">
            <label class="col-2 col-form-label">Ended at</label>
            <input type="date" name="ended_at" id="ended_at" class="col form-control"
                value="{{ old('ended_at', $isEdit ? date('Y-m-d', strtotime($transaction->ended_at)) : '') }}">
        </div>

        <div class="form-group row mb-4">
            <label for="status" class="col-2 col-form-label">Status</label>
            <select name="status" id="status" class="col custom-select">
                <option value="" selected>Please select status</option>
                <option value="not_started" @selected($isEdit && $transaction->status == 'NOT_STARTED')>Not Started</option>
                <option value="started" @selected($isEdit && $transaction->status == 'STARTED')>Started</option>
                <option value="ended" @selected($isEdit && $transaction->status == 'ENDED')>Ended</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $isEdit ? 'Edit' : 'Create' }}
        </button>
    </form>
@stop
