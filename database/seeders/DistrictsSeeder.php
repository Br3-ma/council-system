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
            'province_id' => 1,
            'name' => 'District A',
            'created_by' => 1,
            'comments' => 'Test demo districts'
        ]);
        District::create([
            'province_id' => 1,
            'name' => 'District B',
            'created_by' => 1,
            'comments' => 'Test demo districts'
        ]);
        District::create([
            'province_id' => 2,
            'name' => 'District C',
            'created_by' => 1,
            'comments' => 'Test demo districts'
        ]);
    }
}
