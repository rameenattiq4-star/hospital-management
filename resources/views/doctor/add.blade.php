@extends('layouts.app')

@section('content')

<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f1f5f9;
    }

    .form-container {
        max-width: 600px;
        margin: 40px auto;
        background: #ffffff;
        padding: 35px;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        border: 1px solid #e2e8f0;
    }

    .form-container h2 {
        color: #059669;
        margin: 0 0 25px 0;
        font-size: 22px;
        font-weight: 800;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: #475569;
        text-transform: uppercase;
        margin-bottom: 6px;
        letter-spacing: 0.5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        font-size: 14px;
        background: #f8fafc;
        transition: all 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #059669;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.1);
    }

    .btn-submit {
        background: linear-gradient(135deg, #059669, #047857);
        color: white;
        padding: 13px 30px;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(5, 150, 105, 0.4);
    }

    .btn-cancel {
        background: #f1f5f9;
        color: #475569;
        padding: 13px 26px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        margin-left: 10px;
        transition: all 0.3s;
    }

    .btn-cancel:hover {
        background: #e2e8f0;
    }

    .error-msg {
        background: #fee2e2;
        color: #991b1b;
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 13px;
        margin-bottom: 20px;
        font-weight: 600;
    }
</style>

<div class="form-container">
    <h2>➕ Add New Doctor</h2>

    @if($errors->any())
        <div class="error-msg">
            @foreach($errors->all() as $error)
                ⚠️ {{ $error }}<br>
            @endforeach
        </div>
    @endif

    <form action="{{ url('doctor/create') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Doctor Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
        </div>

        <div class="form-group">
            <label>Hospital</label>
            <select name="hospital_id" required>
                <option value="">-- Select Hospital --</option>
                @foreach($hospitals as $hospital)
                    <option value="{{ $hospital->id }}" {{ old('hospital_id') == $hospital->id ? 'selected' : '' }}>
                        {{ $hospital->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-submit">💾 Save Doctor</button>
        <a href="{{ url('doctor') }}" class="btn-cancel">Cancel</a>
    </form>
</div>

@endsection