@extends('layouts.app')

@section('content')

<div style="max-width: 1200px; margin: 40px auto; padding: 30px;">
    <h1 style="color: #0284c7; font-size: 28px;">🏥 Welcome to Dashboard</h1>
    <p style="color: #64748b; font-size: 16px;">You are logged in successfully!</p>

    <div style="margin-top: 30px; display: flex; gap: 15px;">
        <a href="{{ url('hospital') }}" style="background: #0284c7; color: white; padding: 14px 28px; border-radius: 10px; text-decoration: none; font-weight: 700;">
            🏥 Go to Hospital Dashboard
        </a>
        <a href="{{ url('doctor') }}" style="background: #059669; color: white; padding: 14px 28px; border-radius: 10px; text-decoration: none; font-weight: 700;">
            👨‍⚕️ Go to Doctors
        </a>
    </div>
</div>

@endsection