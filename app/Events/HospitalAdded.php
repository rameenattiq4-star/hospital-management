<?php

namespace App\Events;

use App\Models\Hospital;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HospitalAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $hospital;

    public function __construct(Hospital $hospital)
    {
        $this->hospital = $hospital;
    }
}