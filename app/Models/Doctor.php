<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'hospital_id',
        'name',
        'specialization',
        'phone',
    ];

    // ✅ Reverse — Doctor ka 1 hospital
    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
}