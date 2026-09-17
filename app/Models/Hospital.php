<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'age',
        'date_of_birth',
        'gender',
        'score',
        'image',
    ];

    // ✅ One to One — 1 hospital ka 1 address
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    // ✅ One to Many — 1 hospital ke bohat se doctors
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    // ✅ Many to Many — 1 hospital ke bohat se departments
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    // ✅ Has One Through — Hospital ka first doctor (department ke through)
public function firstDoctor()
{
    return $this->hasOneThrough(
        Doctor::class,       // Final model
        Department::class,   // Through model
        'hospital_id',       // FK on departments table
        'department_id',     // FK on doctors table
        'id',                // Local key on hospitals
        'id'                 // Local key on departments
    );
}
public function allDoctors()
{
    return $this->hasManyThrough(
        Doctor::class,       // Final model
        Department::class,   // Through model
        'hospital_id',       // FK on departments table
        'department_id',     // FK on doctors table
        'id',                // Local key on hospitals
        'id'                 // Local key on departments
    );
}

}