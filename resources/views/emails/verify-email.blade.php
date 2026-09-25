<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
    <a href="{{ $url }}" class="button">Verify Email</a>
</head>
<body style="margin: 0; padding: 0; background: #f1f5f9; font-family: 'Segoe UI', Arial, sans-serif;">

    <table role="presentation" style="width: 100%; background: #f1f5f9; padding: 40px 20px;">
        <tr>
            <td align="center">

                {{-- Main Card --}}
                <table role="presentation" style="
                    max-width: 600px;
                    width: 100%;
                    background: #ffffff;
                    border-radius: 16px;
                    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
                    overflow: hidden;
                ">

                    {{-- HEADER --}}
                    <tr>
                        <td style="
                            background: linear-gradient(135deg, #0284c7, #0369a1);
                            padding: 35px 30px;
                            text-align: center;
                        ">
                            <h1 style="
                                color: #ffffff;
                                margin: 0;
                                font-size: 24px;
                                font-weight: 800;
                            ">
                                🏥 Hospital Management System
                            </h1>
                        </td>
                    </tr>

                    {{-- BODY --}}
                    <tr>
                        <td style="padding: 45px 40px;">

                            {{-- Icon --}}
                            <div style="text-align: center; margin-bottom: 25px;">
                                <div style="
                                    display: inline-block;
                                    width: 80px;
                                    height: 80px;
                                    background: #dbeafe;
                                    border-radius: 50%;
                                    line-height: 80px;
                                    font-size: 40px;
                                ">
                                    📧
                                </div>
                            </div>

                            {{-- Title --}}
                            <h2 style="
                                color: #0f172a;
                                font-size: 22px;
                                font-weight: 800;
                                text-align: center;
                                margin: 0 0 15px 0;
                            ">
                                Verify Your Email Address
                            </h2>

                            {{-- Greeting --}}
                            <p style="
                                color: #475569;
                                font-size: 15px;
                                line-height: 1.7;
                                margin: 0 0 20px 0;
                            ">
                                Hi <strong>{{ $name ?? 'User' }}</strong>,
                            </p>

                            {{-- Message --}}
                            <p style="
                                color: #475569;
                                font-size: 15px;
                                line-height: 1.7;
                                margin: 0 0 30px 0;
                            ">
                                Thanks for signing up! To complete your registration, please verify your email address by clicking the button below.
                            </p>

                            {{-- Button --}}
                            <div style="text-align: center; margin-bottom: 30px;">
                                <a href="{{ $verificationUrl ?? '#' }}" style="
                                    display: inline-block;
                                    background: linear-gradient(135deg, #0284c7, #0369a1);
                                    color: #ffffff;
                                    padding: 16px 40px;
                                    border-radius: 12px;
                                    text-decoration: none;
                                    font-size: 15px;
                                    font-weight: 700;
                                    box-shadow: 0 6px 20px rgba(2, 132, 199, 0.3);
                                ">
                                    ✅ Verify Email Address
                                </a>
                            </div>

                            {{-- Fallback Link --}}
                            <div style="
                                background: #f8fafc;
                                border-left: 4px solid #0284c7;
                                padding: 15px 20px;
                                border-radius: 10px;
                                margin-bottom: 25px;
                            ">
                                <p style="
                                    color: #64748b;
                                    font-size: 12px;
                                    margin: 0 0 8px 0;
                                    font-weight: 700;
                                    text-transform: uppercase;
                                    letter-spacing: 0.5px;
                                ">
                                    Button nahi chal raha? Ye link copy karein:
                                </p>
                                <p style="
                                    color: #0284c7;
                                    font-size: 12px;
                                    margin: 0;
                                    word-break: break-all;
                                    font-family: monospace;
                                ">
                                    {{ $verificationUrl ?? '#' }}
                                </p>
                            </div>

                            {{-- Warning --}}
                            <div style="
                                background: #fef3c7;
                                border-left: 4px solid #f59e0b;
                                padding: 14px 20px;
                                border-radius: 10px;
                                margin-bottom: 25px;
                            ">
                                <p style="
                                    color: #92400e;
                                    font-size: 13px;
                                    margin: 0;
                                    line-height: 1.6;
                                ">
                                    ⚠️ <strong>Important:</strong> If you did not create an account, no further action is required.
                                </p>
                            </div>

                            {{-- Regards --}}
                            <p style="
                                color: #475569;
                                font-size: 15px;
                                line-height: 1.7;
                                margin: 0;
                            ">
                                Regards,<br>
                                <strong style="color: #0284c7;">Hospital Management Team</strong>
                            </p>

                        </td>
                    </tr>

                    {{-- FOOTER --}}
                    <tr>
                        <td style="
                            background: #f8fafc;
                            padding: 25px 30px;
                            text-align: center;
                            border-top: 1px solid #e2e8f0;
                        ">
                            <p style="
                                color: #94a3b8;
                                font-size: 12px;
                                margin: 0 0 8px 0;
                            ">
                                © {{ date('Y') }} Hospital Management System. All rights reserved.
                            </p>
                            <p style="
                                color: #94a3b8;
                                font-size: 12px;
                                margin: 0;
                            ">
                                Made with ❤️ by Rameen Attiq
                            </p>
                        </td>
                    </tr>

                </table>

                {{-- Below Card Text --}}
                <p style="
                    color: #94a3b8;
                    font-size: 11px;
                    text-align: center;
                    margin: 25px 0 0 0;
                    max-width: 600px;
                ">
                    This is an automated email. Please do not reply to this message.
                </p>

            </td>
        </tr>
    </table>

</body>
</html>