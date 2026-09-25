<?php

namespace App\Events;

use App\Models\Hospital;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HospitalAddedBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $hospital;

    public function __construct(Hospital $hospital)
    {
        $this->hospital = $hospital;
    }

    // ✅ Public channel
    public function broadcastOn(): array
    {
        return [
            new Channel('hospitals'),
        ];
    }

    // ✅ Event ka naam (JS mein sunne ke liye)
    public function broadcastAs(): string
    {
        return 'hospital.added';
    }

    // ✅ Kya data bhejna hai
    public function broadcastWith(): array
    {
        return [
            'id'    => $this->hospital->id,
            'name'  => $this->hospital->name,
            'email' => $this->hospital->email,
            'score' => $this->hospital->score,
            'time'  => now()->format('h:i A'),
        ];
    }
}