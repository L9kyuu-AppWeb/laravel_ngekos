<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface; // Perbaiki namespace
use App\Models\BoardingHouse;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();

        if ($search) {
            $query->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
        }

        if ($city) {
            $query->where('city_id', $city);
        }

        if ($category) {
            $query->where('category_id', $category);
        }

        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')
            ->orderBy('transactions_count', 'desc')
            ->take($limit)
            ->get();
    }

    public function getBoardingHousesByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHousesByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHousesBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->firstOrFail();
    }
}
