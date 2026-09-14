@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 40px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <h2>➕ Add New Hospital</h2>

    <form action="{{ url('hospital/store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Name</label>
            <input type="text" name="name" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Email</label>
            <input type="email" name="email" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Age</label>
            <input type="number" name="age" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Date of Birth</label>
            <input type="date" name="date_of_birth" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Gender</label>
            <select name="gender" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
                <option value="">-- Select Gender --</option>
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Score</label>
            <input type="number" name="score" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <button type="submit" 
            style="background: #2563eb; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer;">
            💾 Save Hospital
        </button>

        <a href="{{ url('hospital') }}" 
            style="background: #64748b; color: white; padding: 12px 30px; border-radius: 5px; text-decoration: none; margin-left: 10px;">
            ← Cancel
        </a>
    </form>
</div>

@endsection