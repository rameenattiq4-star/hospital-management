<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('countries')->insert([
            [
                'name' => 'Pakistan',
                'code' => 'PK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'India',
                'code' => 'IN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'China',
                'code' => 'CN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Saudi Arabia',
                'code' => 'SA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'United States',
                'code' => 'US',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'United Kingdom',
                'code' => 'UK',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Turkey',
                'code' => 'TR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bangladesh',
                'code' => 'BD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Afghanistan',
                'code' => 'AF',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Iran',
                'code' => 'IR',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}