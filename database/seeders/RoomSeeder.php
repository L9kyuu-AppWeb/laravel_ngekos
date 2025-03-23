<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        Room::insert([
            [
                'boarding_house_id' => 1,
                'name' => 'Kamar VIP A',
                'room_type' => 'VIP',
                'square_feet' => 250,
                'price_per_month' => 3000000.00,
                'is_available' => true
            ],
            [
                'boarding_house_id' => 1,
                'name' => 'Kamar Standard B',
                'room_type' => 'Standard',
                'square_feet' => 200,
                'price_per_month' => 2000000.00,
                'is_available' => false
            ],
            [
                'boarding_house_id' => 2,
                'name' => 'Kamar Ekonomis C',
                'room_type' => 'Economy',
                'square_feet' => 180,
                'price_per_month' => 1500000.00,
                'is_available' => true
            ],
            [
                'boarding_house_id' => 3,
                'name' => 'Kamar Deluxe D',
                'room_type' => 'Deluxe',
                'square_feet' => 220,
                'price_per_month' => 2500000.00,
                'is_available' => true
            ],
            [
                'boarding_house_id' => 4,
                'name' => 'Kamar Suite E',
                'room_type' => 'Suite',
                'square_feet' => 300,
                'price_per_month' => 3500000.00,
                'is_available' => false
            ],
        ]);
    }
}

