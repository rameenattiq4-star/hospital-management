<?php

namespace Database\Seeders;

use App\Models\Hospital; 
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Hospital::factory(100)->create(); 
    }
}