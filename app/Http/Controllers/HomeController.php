<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface; 
use App\Interfaces\CityRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private CityRepositoryInterface $CityRepository;
    private CategoryRepositoryInterface $CategoryRepository;
    private BoardingHouseRepositoryInterface $BoardingHouseRepository;

    public function __construct(
         CityRepositoryInterface $CityRepository,
         CategoryRepositoryInterface $CategoryRepository,
         BoardingHouseRepositoryInterface $BoardingHouseRepository
    ) {
        $this->CityRepository = $CityRepository;
        $this->CategoryRepository = $CategoryRepository;
        $this->BoardingHouseRepository = $BoardingHouseRepository;
    }

    public function index()
    {
        //
    }
}