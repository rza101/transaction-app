@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Fleets</h1>
@stop

@section('content')
<div class="container-fluid">
    <table class="table">
        <tr>
            <th>No.</th>
            <th>License Number</th>
            <th>Fleet Name</th>
        </tr>

        @foreach ($fleets as $fleet)
            <tr>
                <td>
                    {{ $fleet->id }}
                </td>
                <td>
                    {{ $fleet->license_number }}
                </td>
                <td>
                    {{ $fleet->name }}
                </td>
            </tr>
        @endforeach
    </table>

    <div>
        {{ $fleets->links('pagination::bootstrap-4') }}
    </div>
</div>
@stop
