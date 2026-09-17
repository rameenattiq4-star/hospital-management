<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_id',
        'city',
        'country',
        'street',
    ];

    // ✅ Reverse — Address ka 1 hospital
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}