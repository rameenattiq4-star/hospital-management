@extends('layouts.app')

@section('content')
    <h1>🏥 Hospital Management System</h1>

    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            @forelse($hospitals as $hospital)
                <tr>
                    <td>{{ $hospital->id }}</td>
                    <td>{{ $hospital->name }}</td>
                    <td>{{ $hospital->email }}</td>
                    <td>{{ $hospital->age ?? 'N/A' }}</td>
                    <td>{{ $hospital->gender ?? 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">No data found!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection