@extends('layouts.app')

@section('title', 'About Us - Hospital Management')

@section('about_active', 'active')

@section('content')
    <h1>About Us</h1>
    <p style="text-align: center; color: #888; margin-bottom: 30px;">
        Learn more about who we are and what we do
    </p>

    <div class="info-box">
        <h4>👤 Name: {{ $name ?? 'Guest' }}</h4>
        <h4>📧 Email: {{ $email ?? 'No email provided' }}</h4>
    </div>

    <div>
        <p>Welcome to our website! We are a passionate team dedicated to providing exceptional healthcare services and innovative medical solutions to our patients.</p>
        <p>With years of experience in the healthcare industry, we strive to deliver quality, reliability, and excellence in everything we do.</p>
        <p>Welcome to the <strong>Hospital Management System</strong>. This platform is designed to help healthcare institutions manage patient records, medical data, and administrative tasks efficiently and effectively.</p>
    </div>

    <div class="features">
        <div class="feature-box">
            <div class="icon">🏥</div>
            <h3>Our Mission</h3>
            <p>To provide quality healthcare services to every patient.</p>
        </div>
        <div class="feature-box">
            <div class="icon">💡</div>
            <h3>Our Vision</h3>
            <p>To be a global leader in healthcare innovation.</p>
        </div>
        <div class="feature-box">
            <div class="icon">❤️</div>
            <h3>Our Values</h3>
            <p>Compassion, integrity, and patient care.</p>
        </div>
    </div>

    <div style="text-align: center;">
        <a href="/" class="btn">🏠 Back to Home</a>
    </div>
@endsection