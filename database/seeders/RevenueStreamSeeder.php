<?php

namespace Database\Seeders;

use App\Models\Stream;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevenueStreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stream::create([
            'name' => 'Markets',
            'description' => 'Market bills'
        ]);
        Stream::create([
            'name' => 'Toilets',
            'description' => 'Toilets bills'
        ]);
        Stream::create([
            'name' => 'Bus Stations',
            'description' => 'Bus Stations bills'
        ]);
    }
}
