<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hospital Management System')</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f4f4; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 20px; text-align: center; color: white; }
        .header h1 span { background: rgba(255,255,255,0.2); padding: 5px 15px; border-radius: 10px; }
        .nav { background: white; padding: 15px; text-align: center; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .nav a { display: inline-block; padding: 10px 25px; margin: 0 10px; color: #333; text-decoration: none; border-radius: 25px; }
        .nav a:hover { background: #f0f0f0; }
        .nav a.active { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .container { max-width: 900px; margin: 30px auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); min-height: 400px; }
        .footer { background: #333; color: white; text-align: center; padding: 20px; margin-top: 30px; }
        .footer a { color: #aaa; text-decoration: none; margin: 0 10px; }
        .footer a:hover { color: white; }
        .btn { display: inline-block; padding: 12px 30px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 30px; font-weight: 600; }
        .btn:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4); }
        .info-box { background: #e8f4fd; padding: 15px 20px; border-radius: 10px; margin: 20px 0; border-left: 4px solid #667eea; }
        .features { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin: 30px 0; }
        .feature-box { background: #f8f9fa; padding: 20px; border-radius: 10px; text-align: center; }
        .feature-box .icon { font-size: 2rem; margin-bottom: 10px; }
        .alert-success { background: #d4edda; color: #155724; padding: 15px; border-radius: 10px; border: 1px solid #c3e6cb; margin-bottom: 20px; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 5px; }
        .form-control { width: 100%; padding: 12px 15px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 1rem; }
        .form-control:focus { outline: none; border-color: #667eea; }
        .text-muted { color: #6c757d; font-size: 0.875rem; display: block; margin-top: 5px; }
        .btn-submit { width: 100%; padding: 14px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 10px; font-size: 1.1rem; font-weight: 600; cursor: pointer; }
        .btn-submit:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4); }
        .contact-info-box { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 30px; border-radius: 15px; color: white; flex: 1; min-width: 250px; }
        .contact-info-box p { margin: 10px 0; }
        .social-links { display: flex; gap: 10px; margin-top: 15px; }
        .social-links a { color: white; text-decoration: none; background: rgba(255,255,255,0.2); padding: 10px 15px; border-radius: 10px; }
        .social-links a:hover { background: rgba(255,255,255,0.4); }
        .flex-container { display: flex; gap: 40px; flex-wrap: wrap; }
        .flex-form { flex: 2; min-width: 300px; }
    </style>
    @yield('styles')
</head>
<body>
    <div class="header">
        <h1>🏥 <span>Hospital</span> Management System</h1>
    </div>
    <div class="nav">
        <a href="{{ url('about-us') }}" class="@yield('about_active')">About Us</a>
        <a href="{{ url('contact-us') }}" class="@yield('contact_active')">Contact Us</a>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Hospital Management System. All Rights Reserved.</p>
        <p>
            <a href="{{ url('about-us') }}">About Us</a>
            <a href="{{ url('contact-us') }}">Contact Us</a>
        </p>
    </div>
    @yield('scripts')
</body>
</html>