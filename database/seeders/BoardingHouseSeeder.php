<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BoardingHouse;

class BoardingHouseSeeder extends Seeder
{
    public function run()
    {
        BoardingHouse::insert([
            [
                'name' => 'Kos Elite Jakarta',
                'slug' => 'kos-elite-jakarta',
                'thumbnail' => 'kos_jakarta.jpg',
                'city_id' => 1,
                'category_id' => 1,
                'description' => 'Kos eksklusif di pusat kota Jakarta dengan fasilitas lengkap.',
                'price' => 2500000.00,
                'address' => 'Jl. Sudirman No. 10, Jakarta'
            ],
            [
                'name' => 'Kos Nyaman Bandung',
                'slug' => 'kos-nyaman-bandung',
                'thumbnail' => 'kos_bandung.jpg',
                'city_id' => 2,
                'category_id' => 2,
                'description' => 'Kos nyaman dekat kampus ITB, cocok untuk mahasiswa.',
                'price' => 1500000.00,
                'address' => 'Jl. Dago No. 15, Bandung'
            ],
            [
                'name' => 'Kos Murah Surabaya',
                'slug' => 'kos-murah-surabaya',
                'thumbnail' => 'kos_surabaya.jpg',
                'city_id' => 3,
                'category_id' => 3,
                'description' => 'Kos murah dengan lingkungan aman dan nyaman.',
                'price' => 1200000.00,
                'address' => 'Jl. Diponegoro No. 5, Surabaya'
            ],
            [
                'name' => 'Kos Eksklusif Medan',
                'slug' => 'kos-eksklusif-medan',
                'thumbnail' => 'kos_medan.jpg',
                'city_id' => 4,
                'category_id' => 1,
                'description' => 'Kos eksklusif dengan akses dekat ke pusat perbelanjaan.',
                'price' => 2000000.00,
                'address' => 'Jl. Gatot Subroto No. 20, Medan'
            ],
            [
                'name' => 'Kos Strategis Makassar',
                'slug' => 'kos-strategis-makassar',
                'thumbnail' => 'kos_makassar.jpg',
                'city_id' => 5,
                'category_id' => 2,
                'description' => 'Kos dengan lokasi strategis, dekat kampus dan pusat kuliner.',
                'price' => 1800000.00,
                'address' => 'Jl. Pettarani No. 7, Makassar'
            ],
        ]);
    }
}

