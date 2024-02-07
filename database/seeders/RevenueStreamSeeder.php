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
            'description' => 'Market bills'
        ]);
        StreamDetail::create([
            'stream_id' => $str->id,
        ]);

        $str1 = Stream::create([
            'code'=> 'CM',
            'type'=> 'market',
            'name' => 'Zesco Market',
            'description' => 'Market bills'
        ]);
        StreamDetail::create([
            'stream_id' => $str1->id,
        ]);

        $str2 = Stream::create([
            'code'=> 'ZM',
            'type'=> 'market',
            'name' => 'Nyondo Market',
            'description' => 'Market bills'
        ]);
        StreamDetail::create([
            'stream_id' => $str2->id,
        ]);

        $str3 = Stream::create([
            'code'=> 'TZ',
            'type'=> 'market',
            'name' => 'Tazara Market',
            'description' => 'Market bills'
        ]);
        StreamDetail::create([
            'stream_id' => $str3->id,
        ]);

        // Toilets
        $toi = Stream::create([
            'name' => 'Main Market T',
            'code'=> 'MMT',
            'type'=> 'toilet'
        ]);
        StreamDetail::create([
            'stream_id' => $toi->id,
        ]);

        $toi1 = Stream::create([
            'name' => 'Bus Station',
            'code'=> 'BST',
            'type'=> 'toilet'
        ]);
        StreamDetail::create([
            'stream_id' => $toi1->id,
        ]);

        $toi2 = Stream::create([
            'name' => 'Wembley',
            'code'=> 'WBT',
            'type'=> 'toilet'
        ]);
        StreamDetail::create([
            'stream_id' => $toi2->id,
        ]);

        $toi3 = Stream::create([
            'name' => 'Chiyanga',
            'code'=> 'CGT',
            'type'=> 'toilet'
        ]);
        StreamDetail::create([
            'stream_id' => $toi3->id,
        ]);

        // Customs
        $customs = Stream::create([
            'code'=> 'CML',
            'type'=> 'vehicle',
            'icon' => 'fa-solid:car-side',
            'amount' => 50,
            'name' => 'Cars',
        ]);
        StreamDetail::create([
            'stream_id' => $customs->id,
            'description' => 'Van/Light Truck'
        ]);

        $customs1 = Stream::create([
            'code'=> 'CML',
            'type'=> 'vehicle',
            'name' => 'Van/Light Truck',
            'icon' => 'fa-solid:truck-moving',
            'amount' => 70,
        ]);
        StreamDetail::create([
            'stream_id' => $customs1->id,
            'description' => 'Van/Light Truck',
        ]);

        $customs2 = Stream::create([
            'code'=> 'CML',
            'type'=> 'vehicle',
            'name' => 'Rosa Bus',
            'amount' => 100,
            'icon' => 'fluent-emoji-high-contrast:bus'
        ]);
        StreamDetail::create([
            'stream_id' => $customs2->id,
            'description' => 'Rosa Bus'
        ]);

        $customs3 = Stream::create([
            'code'=> 'CML',
            'type'=> 'vehicle',
            'icon' => 'fontisto:truck',
            'amount' => 120,
            'name' => 'Truck/Small Water Bowser'
        ]);
        StreamDetail::create([
            'stream_id' => $customs3->id,
            'description' => 'Truck/Small Water Bowser'
        ]);

        $customs4 = Stream::create([
            'code'=> 'CML',
            'type'=> 'vehicle',
            'amount' => 150,
            'name' => 'Tanker',
            'icon' => 'mdi:tanker-truck'
        ]);
        StreamDetail::create([
            'stream_id' => $customs4->id,
            'description' => 'Tanker',
        ]);

        $customs5 = Stream::create([
            'code'=> 'CML',
            'type'=> 'vehicle',
            'amount' => 250,
            'name' => 'Container',
            'icon' => 'mdi:train-car-container'
        ]);
        StreamDetail::create([
            'stream_id' => $customs5->id,
            'description' => 'Container'
        ]);

        // Sand
        $sand = Stream::create([
            'name' => 'Sand Levy',
            'code'=> 'SND',
            'type'=> 'sand'
        ]);
        StreamDetail::create([
            'stream_id' => $sand->id,
            'description' => 'Sand Levy',
        ]);

        $sand1 = Stream::create([
            'name' => 'Charcoal Levy',
            'code'=> 'CHL',
            'type'=> 'charcoal'
        ]);
        StreamDetail::create([
            'stream_id' => $sand1->id,
            'description' => 'Charcoal Levy',
        ]);
    }
}
