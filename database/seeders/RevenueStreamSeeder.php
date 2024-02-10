<?php

namespace Database\Seeders;

use App\Models\Stream;
use App\Models\StreamDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevenueStreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
    **/
    public function run(): void
    {
        // Markets
        $str = Stream::create([
            'code'=> 'MM',
            'type'=> 'market',
            'name' => 'Main Market',
            'description' => 'Market Fees',
            'icon' => 'healthicons:market-stall'
        ]);
        StreamDetail::create([
            'stream_id' => $str->id,
        ]);

        $str0 = Stream::create([
            'name' => 'Chiyanga Market',
            'code'=> 'CGT',
            'type'=> 'toilet',
            'icon' => 'fa-solid:restroom'
        ]);
        StreamDetail::create([
            'stream_id' => $str0->id,
        ]);

        $str2 = Stream::create([
            'code'=> 'NM',
            'type'=> 'market',
            'name' => 'Nyondo Market',
            'description' => 'Market Fees',
            'icon' => 'healthicons:market-stall'
        ]);
        StreamDetail::create([
            'stream_id' => $str2->id,
        ]);

        $str3 = Stream::create([
            'code'=> 'TZ',
            'type'=> 'market',
            'name' => 'Tazara Market',
            'description' => 'Market Fees',
            'icon' => 'healthicons:market-stall'
        ]);
        StreamDetail::create([
            'stream_id' => $str3->id,
        ]);

        $str1 = Stream::create([
            'code'=> 'ZM',
            'type'=> 'market',
            'name' => 'Zesco Market',
            'description' => 'Market Fees',
            'icon' => 'healthicons:market-stall'
        ]);
        StreamDetail::create([
            'stream_id' => $str1->id,
        ]);

        // Toilets
        $toi = Stream::create([
            'name' => 'Main Market Toilet',
            'code'=> 'MMT',
            'type'=> 'toilet',
            'description' => 'Toilet Fees',
            'icon' => 'fa-solid:restroom'
        ]);
        StreamDetail::create([
            'stream_id' => $toi->id,
        ]);

        $toi1 = Stream::create([
            'name' => 'Bus Station Toilet',
            'code'=> 'BST',
            'type'=> 'toilet',
            'description' => 'Toilet Fees',
            'icon' => 'fa-solid:restroom'
        ]);
        StreamDetail::create([
            'stream_id' => $toi1->id,
        ]);

        $toi2 = Stream::create([
            'name' => 'Wembley Toilet',
            'code'=> 'WBT',
            'type'=> 'toilet',
            'description' => 'Toilet Fees',
            'icon' => 'fa-solid:restroom'
        ]);
        StreamDetail::create([
            'stream_id' => $toi2->id,
        ]);

        $toi3 = Stream::create([
            'name' => 'Chiyanga Toilet',
            'code'=> 'WBT',
            'type'=> 'toilet',
            'description' => 'Toilet Fees',
            'icon' => 'fa-solid:restroom'
        ]);
        StreamDetail::create([
            'stream_id' => $toi3->id,
        ]);

        // Customs
        $customs = Stream::create([
            'code'=> 'CML',
            'type'=> 'customs',
            'icon' => 'fa-solid:car-side',
            'amount' => 50,
            'name' => 'Cars',
            'description' => 'Customs Fees'
        ]);
        StreamDetail::create([
            'stream_id' => $customs->id,
        ]);

        $customs1 = Stream::create([
            'code'=> 'CML',
            'type'=> 'customs',
            'name' => 'Van/Light Truck',
            'icon' => 'fa-solid:truck-moving',
            'amount' => 70,
            'description' => 'Customs Fees'
        ]);
        StreamDetail::create([
            'stream_id' => $customs1->id,
        ]);

        $customs2 = Stream::create([
            'code'=> 'CML',
            'type'=> 'customs',
            'name' => 'Rosa Bus',
            'amount' => 100,
            'icon' => 'fluent-emoji-high-contrast:bus',
            'description' => 'Customs Fees'
        ]);
        StreamDetail::create([
            'stream_id' => $customs2->id,
        ]);

        $customs3 = Stream::create([
            'code'=> 'CML',
            'type'=> 'vehicle',
            'icon' => 'fontisto:truck',
            'amount' => 120,
            'name' => 'Truck/Small Water Bowser',
            'description' => 'Customs Fees'
        ]);
        StreamDetail::create([
            'stream_id' => $customs3->id,
        ]);

        $customs4 = Stream::create([
            'code'=> 'CML',
            'type'=> 'customs',
            'amount' => 150,
            'name' => 'Tanker',
            'icon' => 'mdi:tanker-truck',
            'description' => 'Customs Fees'
        ]);
        StreamDetail::create([
            'stream_id' => $customs4->id,
        ]);

        $customs5 = Stream::create([
            'code'=> 'CML',
            'type'=> 'customs',
            'amount' => 250,
            'name' => 'Container',
            'icon' => 'mdi:train-car-container',
            'description' => 'Customs Fees'
        ]);
        StreamDetail::create([
            'stream_id' => $customs5->id,
        ]);

        // Sand
        $sand = Stream::create([
            'name' => 'Sand Levy',
            'code'=> 'SND',
            'type'=> 'sand',
            'description' => 'Sand Fees',
            'icon'=>'mdi:timer-sand-complete'
        ]);
        StreamDetail::create([
            'stream_id' => $sand->id,
        ]);

        $sand1 = Stream::create([
            'name' => 'Charcoal Levy',
            'code'=> 'CHL',
            'type'=> 'charcoal',
            'description' => 'Charcoal Fees',
            'icon'=>'mdi:charcoal-outline'
        ]);
        StreamDetail::create([
            'stream_id' => $sand1->id,
        ]);
    }
}
