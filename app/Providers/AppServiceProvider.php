<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Hospital;
use App\Policies\HospitalPolicy;
use App\Events\HospitalAdded;
use App\Listeners\SendWelcomeEmail;
use App\Listeners\LogHospitalActivity;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ✅ Policy Register
        Gate::policy(Hospital::class, HospitalPolicy::class);

// ✅ Event Listeners Register
Event::listen(
    HospitalAdded::class,
    SendWelcomeEmail::class,
);

Event::listen(
    HospitalAdded::class,
    LogHospitalActivity::class,
);

        // ✅ Custom Verify Email Template
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Verify Your Email Address')
                ->view('emails.verify-email', compact('url'));
        });
    }
}