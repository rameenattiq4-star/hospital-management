<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // ✅ Reverse — Department ke bohat se hospitals
    public function hospitals()
    {
        return $this->belongsToMany(Hospital::class);
    }
}