<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Province::create(['name' => 'Lusaka']);
        Province::create(['name' => 'Copperbelt']);
        Province::create(['name' => 'Central']);
        Province::create(['name' => 'Eastern']);
        Province::create(['name' => 'Luapula']);
        Province::create(['name' => 'Muchinga']);
        Province::create(['name' => 'Northern']);
        Province::create(['name' => 'North-Western']);
        Province::create(['name' => 'Southern']);
        Province::create(['name' => 'Western']);
    }
}
