<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'hospital_id',
    ];

    // ✅ Hospital relationship
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}