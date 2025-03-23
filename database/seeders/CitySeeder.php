<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run()
    {
        City::insert([
            ['image' => 'jakarta.jpg', 'name' => 'Jakarta', 'slug' => 'jakarta'],
            ['image' => 'bandung.jpg', 'name' => 'Bandung', 'slug' => 'bandung'],
            ['image' => 'surabaya.jpg', 'name' => 'Surabaya', 'slug' => 'surabaya'],
            ['image' => 'medan.jpg', 'name' => 'Medan', 'slug' => 'medan'],
            ['image' => 'makassar.jpg', 'name' => 'Makassar', 'slug' => 'makassar'],
        ]);
    }
}

