<?php

namespace App\Listeners;

use App\Events\HospitalAdded;
use Illuminate\Support\Facades\Log;

class LogHospitalActivity
{
    public function handle(HospitalAdded $event): void
    {
        // ✅ Log likho
        Log::info('Hospital Added', [
            'id' => $event->hospital->id,
            'name' => $event->hospital->name,
            'email' => $event->hospital->email,
            'time' => now()->format('d M Y, H:i'),
        ]);
    }
}