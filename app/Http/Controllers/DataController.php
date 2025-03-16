<?php

namespace App\Http\Controllers;

use App\Models\CityTariff;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getCities() {}
    public function getTariffsByCity(int $cityId) {
        return CityTariff::getCityTariffs($cityId);
    }
}
