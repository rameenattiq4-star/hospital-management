<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Hospital;
use App\Policies\HospitalPolicy;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ✅ Policy Register (agar auto-discovery kaam nahi karta)
        Gate::policy(Hospital::class, HospitalPolicy::class);
    }
}