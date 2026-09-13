@extends('layouts.app')

@section('content')
<div class="container">
    <h1>🏥 Hospital Management System</h1>

    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f0f0f0;">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Date of Birth</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            @forelse($hospitals as $hospital)
            <tr>
                <td>{{ $hospital->id }}</td>
                <td>{{ $hospital->name }}</td>
                <td>{{ $hospital->email }}</td>
                <td>{{ $hospital->age }}</td>
                <td>{{ $hospital->date_of_birth }}</td>
                <td>{{ $hospital->gender }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">No data found!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection