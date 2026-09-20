<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Hospital;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ✅ Gate 1: Edit Hospital — sirf owner edit kar sakta
        Gate::define('edit-hospital', function (User $user, Hospital $hospital) {
            return $user->id === $hospital->user_id;
        });

        // ✅ Gate 2: Delete Hospital — sirf owner delete kar sakta
        Gate::define('delete-hospital', function (User $user, Hospital $hospital) {
            return $user->id === $hospital->user_id;
        });

        // ✅ Gate 3: Admin check
        Gate::define('is-admin', function (User $user) {
            return $user->user_type === 'admin';
        });
    }
}