<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: white;
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #333;
            font-size: 2rem;
        }

        .header h1 span {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            padding: 5px 15px;
            border-radius: 10px;
            color: white;
        }

        .nav {
            text-align: center;
            margin-bottom: 30px;
        }

        .nav a {
            display: inline-block;
            padding: 10px 25px;
            margin: 0 10px;
            background: #f0f0f0;
            color: #333;
            text-decoration: none;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .nav a:hover {
            background: #e0e0e0;
        }

        .nav a.active {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        h1 {
            color: #333;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 10px;
            position: relative;
        }

        h1::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            margin: 10px auto 0;
            border-radius: 2px;
        }

        .subtitle {
            text-align: center;
            color: #888;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .contact-wrapper {
                grid-template-columns: 1fr;
            }
        }

        .contact-info {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            padding: 30px;
            border-radius: 15px;
            color: white;
        }

        .contact-info h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            transition: background 0.3s ease;
        }

        .info-item:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .info-icon {
            font-size: 1.5rem;
            margin-right: 15px;
            width: 40px;
            text-align: center;
        }

        .info-item h3 {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .info-item p {
            font-size: 1rem;
            font-weight: 500;
        }

        .social-media {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .social-media h3 {
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            display: inline-block;
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-links a:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-3px);
        }

        .contact-form h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #f5576c;
            box-shadow: 0 0 0 3px rgba(245, 87, 108, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(245, 87, 108, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-home {
            display: inline-block;
            padding: 12px 30px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-top: 20px;
            text-align: center;
        }

        .btn-home:hover {
            background: #555;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .footer-text {
            text-align: center;
            color: #aaa;
            font-size: 0.9rem;
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
            text-align: center;
        }

        .text-muted {
            color: #6c757d;
            font-size: 0.875rem;
            display: block;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Student <span>Management</span> System</h1>
        </div>

        <!-- Navigation -->
        <div class="nav">
            <a href="{{ url('about-us') }}">About Us</a>
            <a href="{{ url('contact-us') }}" class="active">Contact Us</a>
        </div>

        <h1>Contact Us</h1>
        <p class="subtitle">We'd love to hear from you! Get in touch with us.</p>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h4>Email: {{ $email ?? 'No email provided' }}</h4>
        <br>

        <div class="contact-wrapper">
            <!-- Left Side - Contact Info -->
            <div class="contact-info">
                <h2>📬 Get in Touch</h2>

                <div class="info-item">
                    <span class="info-icon">📍</span>
                    <div>
                        <h3>Address</h3>
                        <p>123 Main Street, City, Country</p>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-icon">📧</span>
                    <div>
                        <h3>Email</h3>
                        <p>info@example.com</p>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-icon">📞</span>
                    <div>
                        <h3>Phone</h3>
                        <p>+1 (555) 123-4567</p>
                    </div>
                </div>

                <div class="info-item">
                    <span class="info-icon">🕐</span>
                    <div>
                        <h3>Working Hours</h3>
                        <p>Mon-Fri: 9:00 AM - 6:00 PM</p>
                    </div>
                </div>

                <div class="social-media">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="#" title="Facebook">📘</a>
                        <a href="#" title="Twitter">🐦</a>
                        <a href="#" title="Instagram">📸</a>
                        <a href="#" title="LinkedIn">🔗</a>
                        <a href="#" title="YouTube">▶️</a>
                    </div>
                </div>
            </div>

            <!-- Right Side - Contact Form -->
            <div class="contact-form">
                <h2>📝 Send a Message</h2>

                <form action="{{ url('contact-us') }}" method="POST">
                    @csrf

                    @include('SubView.input', [
                        'name' => 'name',
                        'label' => 'Full Name',
                        'type' => 'text',
                        'placeholder' => 'Enter your full name',
                        'required' => 'required'
                    ])

                    @include('SubView.input', [
                        'name' => 'email',
                        'label' => 'Email Address',
                        'type' => 'email',
                        'placeholder' => 'Enter your email address',
                        'required' => 'required'
                    ])

                    @include('SubView.input', [
                        'name' => 'subject',
                        'label' => 'Subject',
                        'type' => 'text',
                        'placeholder' => 'Enter subject'
                    ])

                    @include('SubView.input', [
                        'name' => 'message',
                        'label' => 'Message',
                        'type' => 'textarea',
                        'placeholder' => 'Write your message here...',
                        'rows' => 5,
                        'required' => 'required',
                        'help' => 'Please write a detailed message'
                    ])

                    <button type="submit" class="btn-submit">📤 Send Message</button>
                </form>

                <div style="text-align: center; margin-top: 15px;">
                    <a href="/" class="btn-home">🏠 Back to Home</a>
                </div>
            </div>
        </div>

        <div class="footer-text">
            &copy; <?php echo date('Y'); ?> All Rights Reserved.
        </div>
    </div>
</body>
</html>