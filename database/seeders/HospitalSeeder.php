<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hospital;

class HospitalSeeder extends Seeder
{
    public function run(): void
    {
        Hospital::create([
            'name' => 'City Hospital',
            'email' => 'city@hospital.com',
            'age' => 25,
            'date_of_birth' => '1999-01-01',
            'gender' => 'f',
            'score' => 85,
        ]);
    }
}