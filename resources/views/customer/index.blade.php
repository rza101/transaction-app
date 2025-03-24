@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customers</h1>
@stop

@section('content')
    <div class="container-fluid">
        <table class="table">
            <tr>
                <th>No.</th>
                <th>Name</th>
            </tr>

            @foreach ($customers as $customer)
                <tr>
                    <td>
                        {{ $customer->id }}
                    </td>
                    <td>
                        {{ $customer->name }}
                    </td>
                </tr>
            @endforeach
        </table>

        <div>
            {{ $customers->links('pagination::bootstrap-4') }}
        </div>
    </div>
@stop
