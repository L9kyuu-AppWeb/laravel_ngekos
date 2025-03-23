<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            ['image' => 'category1.jpg', 'name' => 'Elektronik', 'slug' => 'elektronik'],
            ['image' => 'category2.jpg', 'name' => 'Fashion', 'slug' => 'fashion'],
            ['image' => 'category3.jpg', 'name' => 'Makanan', 'slug' => 'makanan'],
            ['image' => 'category4.jpg', 'name' => 'Kesehatan', 'slug' => 'kesehatan'],
            ['image' => 'category5.jpg', 'name' => 'Olahraga', 'slug' => 'olahraga'],
        ]);
    }
}

