<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomImage;

class RoomImageSeeder extends Seeder
{
    public function run()
    {
        RoomImage::insert([
            [
                'room_id' => 1,
                'image' => 'images/room1_1.jpg'
            ],
            [
                'room_id' => 1,
                'image' => 'images/room1_2.jpg'
            ],
            [
                'room_id' => 2,
                'image' => 'images/room2_1.jpg'
            ],
            [
                'room_id' => 3,
                'image' => 'images/room3_1.jpg'
            ],
            [
                'room_id' => 3,
                'image' => 'images/room3_2.jpg'
            ],
        ]);
    }
}

