<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::create([
            'province_id' => 7,
            'name' => 'Nakonde',
            'created_by' => 1,
            'comments' => 'Test demo districts'
        ]);
    }
}
