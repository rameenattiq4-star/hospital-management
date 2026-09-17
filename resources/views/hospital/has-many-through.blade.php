@extends('layouts.app')

@section('content')

<style>
    * { box-sizing: border-box; }
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f1f5f9;
    }
    .container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 20px;
    }
    .card {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    h2 {
        color: #17203d;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th {
        background: #17203d;
        color: white;
        padding: 12px;
        text-align: left;
        font-size: 13px;
    }
    td {
        padding: 12px;
        border-bottom: 1px solid #e5e7eb;
        font-size: 13px;
    }
    .badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 15px;
        font-size: 11px;
        font-weight: 600;
        margin: 2px;
    }
    .badge-doctor {
        background: #e0e7ff;
        color: #4338ca;
    }
    .badge-address {
        background: #d1fae5;
        color: #047857;
    }
    .no-data {
        color: #94a3b8;
        font-size: 12px;
    }
</style>

<div class="container">
    <div class="card">

        <h2>🏥 Hospital → All Doctors (HasManyThrough)</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hospital Name</th>
                    <th>📍 Address</th>
                    <th>👨‍⚕️ All Doctors</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($hospitals as $hospital)
                    <tr>
                        <td>#{{ $hospital->id }}</td>
                        <td><strong>{{ $hospital->name }}</strong></td>
                        <td>
                            @if($hospital->address)
                                <span class="badge badge-address">
                                    📍 {{ $hospital->address->city }}
                                </span>
                            @else
                                <span class="no-data">No Address</span>
                            @endif
                        </td>
                        <td>
                            @forelse($hospital->allDoctors as $doctor)
                                <span class="badge badge-doctor">
                                    👨‍⚕️ {{ $doctor->name }}
                                </span>
                            @empty
                                <span class="no-data">No Doctors</span>
                            @endforelse
                        </td>
                        <td>
                            <strong>{{ $hospital->allDoctors->count() }}</strong>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center; padding:30px;">
                            No hospitals found!
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top: 20px; text-align: center;">
            {{ $hospitals->links() }}
        </div>

    </div>
</div>

@endsection