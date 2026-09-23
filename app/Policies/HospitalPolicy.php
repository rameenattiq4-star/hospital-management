<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hospital;

class HospitalPolicy
{
    /**
     * Kya user koi bhi hospital dekh sakta hai?
     */
    public function viewAny(User $user): bool
    {
        return true;   // Sab dekh sakte hain
    }

    /**
     * Kya user ye specific hospital dekh sakta hai?
     */
    public function view(User $user, Hospital $hospital): bool
    {
        return $user->id === $hospital->user_id;
    }

    /**
     * Kya user naya hospital create kar sakta hai?
     */
    public function create(User $user): bool
    {
        return true;   // Sab create kar sakte hain
    }

    /**
     * Kya user ye hospital edit kar sakta hai?
     */
    public function update(User $user, Hospital $hospital): bool
    {
        return $user->id === $hospital->user_id;
    }

    /**
     * Kya user ye hospital delete kar sakta hai?
     */
    public function delete(User $user, Hospital $hospital): bool
    {
        return $user->id === $hospital->user_id;
    }

    /**
     * Kya user ye hospital restore kar sakta hai?
     */
    public function restore(User $user, Hospital $hospital): bool
    {
        return $user->id === $hospital->user_id;
    }

    /**
     * Kya user ye hospital permanently delete kar sakta hai?
     */
    public function forceDelete(User $user, Hospital $hospital): bool
    {
        return $user->id === $hospital->user_id;
    }
}