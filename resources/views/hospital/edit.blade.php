@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 40px auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <h2>✏️ Edit Hospital</h2>

    @if($errors->any())
        <div style="background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            <ul style="margin: 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('hospital/update/' . $hospital->id) }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Name</label>
            <input type="text" name="name" value="{{ old('name', $hospital->name) }}" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Email</label>
            <input type="email" name="email" value="{{ old('email', $hospital->email) }}" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Age</label>
            <input type="number" name="age" value="{{ old('age', $hospital->age) }}" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Date of Birth</label>
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $hospital->date_of_birth) }}" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Gender</label>
            <select name="gender" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
                <option value="m" {{ old('gender', $hospital->gender) == 'm' ? 'selected' : '' }}>Male</option>
                <option value="f" {{ old('gender', $hospital->gender) == 'f' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Score</label>
            <input type="number" name="score" value="{{ old('score', $hospital->score) }}" 
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 5px;" required>
        </div>

        <button type="submit" 
            style="background: #22c55e; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 1rem; cursor: pointer;">
            💾 Update Hospital
        </button>

        <a href="{{ url('hospital') }}" 
            style="background: #64748b; color: white; padding: 12px 30px; border-radius: 5px; text-decoration: none; margin-left: 10px;">
            ← Cancel
        </a>
    </form>
</div>

@endsection