<?php

namespace App\Listeners;

use App\Events\HospitalAdded;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail implements ShouldQueue
{
    public function handle(HospitalAdded $event): void
    {
        // ✅ Email bhejo (queue ke saath)
        Mail::to($event->hospital->email)
            ->queue(new WelcomeMail($event->hospital->image));
    }
}