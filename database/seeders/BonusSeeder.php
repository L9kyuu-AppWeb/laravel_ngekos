<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bonus;

class BonusSeeder extends Seeder
{
    public function run()
    {
        Bonus::insert([
            [
                'boarding_house_id' => 1,
                'name' => 'WiFi Gratis',
                'description' => 'Akses internet gratis dengan kecepatan tinggi.'
            ],
            [
                'boarding_house_id' => 1,
                'name' => 'Sarapan Gratis',
                'description' => 'Sarapan pagi gratis setiap hari untuk penghuni.'
            ],
            [
                'boarding_house_id' => 2,
                'name' => 'Laundry Gratis',
                'description' => 'Layanan laundry gratis dua kali seminggu.'
            ],
            [
                'boarding_house_id' => 3,
                'name' => 'Air Minum Gratis',
                'description' => 'Dispenser air minum tersedia di setiap lantai.'
            ],
            [
                'boarding_house_id' => 4,
                'name' => 'Parkir Motor Gratis',
                'description' => 'Area parkir motor luas dan gratis untuk penghuni.'
            ],
        ]);
    }
}

