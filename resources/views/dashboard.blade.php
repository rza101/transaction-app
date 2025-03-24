@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">
        Create Transaction
    </a>
    <table class="table mt-4">
        <tr>
            <th>No.</th>
            <th>Customer Name</th>
            <th>Fleet Licnse Number</th>
            <th>Started At</th>
            <th>Ended At</th>
            <th>Status</th>
            <th>Total Price</th>
            <th>Actions</th>
        </tr>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->customer->name }}</td>
                <td>{{ $transaction->fleet->license_number }}</td>
                <td>{{ $transaction->started_at }}</td>
                <td>{{ $transaction->ended_at }}</td>
                <td>
                    {{ match ($transaction->status) {
                        'NOT_STARTED' => 'Not Started',
                        'STARTED' => 'Started',
                        'ENDED' => 'Ended',
                    } }}
                </td>
                <td>{{ $transaction->total_price }}</td>
                <td>
                    <a href="{{ route('transactions.edit', $transaction->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@stop
