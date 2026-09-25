<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class MailController extends Controller
{
    public function welcomeEmail()
    {
        // ✅ Image ka FULL PATH
        $imagePath = public_path('storage/hospitals/CKFU8zdtp9snm7G2epjPWX8eYOA7Acm8RCzTEFUL.jpg');

        // ✅ Mail bhejo with attachment
        Mail::to('recipient@example.com')->queue(new WelcomeMail($imagePath));

        return 'Email sent successfully with attachment!';
    }
}