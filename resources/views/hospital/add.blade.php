@extends('layouts.app')

@section('content')

<div style="max-width: 800px; margin: 40px auto; background: white; padding: 40px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

    <h2 style="font-size: 24px; margin-bottom: 5px;">➕ Add New Hospital</h2>
    <p style="color: #64748b; font-size: 13px; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 2px solid #facc15;">
        Fill in the details below to add a new hospital to the system.
    </p>

    @if ($errors->any())
        <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 15px 20px; border-radius: 8px; margin-bottom: 25px;">
            <ul style="margin: 0; padding-left: 20px; font-size: 13px;">
                @foreach ($errors->all() as $error)
                    <li style="margin-bottom: 4px;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ✅ SIRF 1 FORM TAG — enctype ke saath --}}
    <form action="{{ url('hospital/store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">

            <div>
                <label style="display: block; font-weight: 600; font-size: 13px; margin-bottom: 6px;">
                    Full Name <span style="color: red;">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}"
                    placeholder="Enter full name"
                    required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none;">
                @error('name')
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label style="display: block; font-weight: 600; font-size: 13px; margin-bottom: 6px;">
                    Email Address <span style="color: red;">*</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}"
                    placeholder="Enter email address"
                    required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none;">
                @error('email')
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">

            <div>
                <label style="display: block; font-weight: 600; font-size: 13px; margin-bottom: 6px;">
                    Age <span style="color: red;">*</span>
                </label>
                <input type="number" name="age" value="{{ old('age') }}"
                    placeholder="Enter age"
                    required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none;">
                @error('age')
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label style="display: block; font-weight: 600; font-size: 13px; margin-bottom: 6px;">
                    Date of Birth <span style="color: red;">*</span>
                </label>
                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"
                    required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none;">
                @error('date_of_birth')
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">

            <div>
                <label style="display: block; font-weight: 600; font-size: 13px; margin-bottom: 6px;">
                    Gender <span style="color: red;">*</span>
                </label>
                <select name="gender" required
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none;">
                    <option value="">-- Select Gender --</option>
                    <option value="m" {{ old('gender') == 'm' ? 'selected' : '' }}>Male</option>
                    <option value="f" {{ old('gender') == 'f' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label style="display: block; font-weight: 600; font-size: 13px; margin-bottom: 6px;">
                    Score
                </label>
                <input type="number" name="score" value="{{ old('score') }}"
                    placeholder="Enter score (0-100)"
                    style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; outline: none;">
                @error('score')
                    <p style="color: #ef4444; font-size: 11px; margin-top: 5px;">{{ $message }}</p>
                @enderror
            </div>

        </div>

        {{-- ✅ SIRF 1 IMAGE FIELD — Score ke baad --}}
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: 600; font-size: 13px; margin-bottom: 6px;">
                Hospital Image
            </label>
            <input type="file" name="image" accept="image/*"
                style="width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
            @error('image')
                <p style="color: #ef4444; font-size: 11px; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div style="display: flex; gap: 12px; margin-top: 30px;">
            <button type="submit"
                style="background: #17203d; color: white; padding: 12px 28px; border: none; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer;">
                💾 Save Hospital
            </button>
            <a href="{{ url('hospital') }}"
                style="background: #64748b; color: white; padding: 12px 28px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600;">
                ← Back to Dashboard
            </a>
        </div>

    </form>

</div>

@endsection